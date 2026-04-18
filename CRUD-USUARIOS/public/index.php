<?php 

declare(strict_types=1); 

(function (): void { 
     $requestPath = rtrim( 
        (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH),
 '/' 
); 

$publicBase = rtrim(dirname((string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php')), '/');

 
if ($requestPath !== $publicBase && !str_starts_with($requestPath, $publicBase . '/')) {

 if (session_status() !== PHP_SESSION_ACTIVE) { 
     session_start();
   } 

     $dest = isset($_SESSION['auth']['id']) ? 'home' : 'auth.login'; 
     header('Location: ' . $publicBase . '/index.php?route=' . $dest); 
   exit; 
} })();

require_once __DIR__ .  '/../Common/ClassLoader.php'; 
require_once __DIR__ .  '/../Common/DependencyInjection.php';
require_once __DIR__ . '/../Infraestructure/Entrypoints/Web/Presentation/View.php'; 
require_once __DIR__ . '/../Infraestructure/Entrypoints/Web/Presentation/Flash.php'; 


DependencyInjection::boot(); 
Flash::start(); 

function isLoggedIn(): bool 
{ 
  return isset($_SESSION['auth']['id']); 
} 

function requireAuth(): void 
{ 
    if (!isLoggedIn()) { 
                Flash::setMessage('Debes iniciar sesión para acceder a esta sección.'); 
                View::redirect('auth.login'); 
   } 
} 

function getLoggedUser(): array 
{ 
   return is_array($_SESSION['auth'] ?? null) ? $_SESSION['auth'] : array(); 
} 

// ────────────────────────────────────────────────────────────── 
// Routing 
// ──────────────────────────────────────────────────────────────

$route = isset($_GET['route']) ? trim((string) $_GET['route']) : 'home'; 
$routes = WebRoutes::routes(); 

     if (!isset($routes[$route])) { 
      http_response_code(404); 
      View::render('home', buildHomeViewData('Ruta no encontrada.')); 
      exit;
 } 
  
      $definition = $routes[$route]; 
      $httpMethod = strtoupper((string) $_SERVER['REQUEST_METHOD']);

if ($httpMethod !== $definition['method']) { 
             http_response_code(405); 
             View::render('home', buildHomeViewData('Método HTTP no permitido.')); 
             exit; 
   }  

        $publicActions = array('home', 'login', 'authenticate', 'logout', 'forgot', 'forgot.send', 'create', 'store'); 
        if (!in_array($definition['action'], $publicActions, true) && !isLoggedIn()) { 
        Flash::setMessage('Debes iniciar sesión para acceder a esta sección.'); 
        View::redirect('auth.login'); 
     } 

        try { 
              switch ($definition['action']){

              case 'home': 
                  View::render('home', buildHomeViewData()); 
                  break; 

        case 'create': 
               View::render('users/create', buildCreateUserViewData()); 
               break; 

       case 'store': 
              $controller = DependencyInjection::getUserController(); 
              $form = getCreateUserFormData(); 
              $form['id'] = generateUuid4(); 
              $errors = validateCreateUserForm($form); 

              if (!empty($errors)) { 
                 Flash::setOld($form); 
                 Flash::setErrors($errors); 
                 Flash::setMessage('Corrige los errores del formulario.'); 
                 View::redirect('users.create'); 
        } 

          $request = new CreateUserWebRequest( 
          $form['id'], 
          $form['name'], 
          $form['email'], 
          $form['password'], 
          $form['role'] 
); 

$controller->store($request); 
Flash::setSuccess('Usuario registrado correctamente.'); 
View::redirect('users.index');
break;

case 'index': 
     $controller = DependencyInjection::getUserController(); 
     $users = $controller->index(); 
     View::render('users/list', buildListUsersViewData($users)); 
     break;

case 'show': 
$controller = DependencyInjection::getUserController(); 
$id = isset($_GET['id']) ? trim((string) $_GET['id']) : ''; 
$user = $controller->show($id); 
View::render('users/show', array( 
     'pageTitle' => 'Detalle de usuario', 
      'user' => $user, 
      'message' => Flash::message(), 
)); 
break; 

case 'edit': 
        $controller = DependencyInjection::getUserController(); 
        $id = isset($_GET['id']) ? trim((string) $_GET['id']) : ''; 
        $user = $controller->show($id); View::render('users/edit', buildEditUserViewData($user)); 
         break;

case 'update': 
$controller = DependencyInjection::getUserController(); 
$form = getUpdateUserFormData(); 
$errors = validateUpdateUserForm($form); 

          if (!empty($errors)) {
              Flash::setOld($form); 
              Flash::setErrors($errors); 
              Flash::setMessage('Corrige los errores del formulario.'); 
              header('Location: ?route=users.edit&id=' . urlencode($form['id'])); 
              exit; 
} 

   $request = new UpdateUserWebRequest( 
                  $form['id'], 
                  $form['name'], 
                  $form['email'], 
                  $form['password'], 
                  $form['role'], 
                  $form['status'] ); 
                  $controller->update($request);

Flash::setSuccess('Usuario actualizado correctamente.'); 
View::redirect('users.index'); 
break; 

case 'delete': 
$controller = DependencyInjection::getUserController(); 
$id = isset($_POST['id']) ? trim((string) $_POST['id']) : ''; 
$controller->delete($id); 
Flash::setSuccess('Usuario eliminado correctamente.'); 
View::redirect('users.index'); 
break; 

case 'login': 
       if (isLoggedIn()) { 
               View::redirect('home'); 
  } 

      View::render('auth/login', array( 
                 'pageTitle' => 'Iniciar sesión', 
                 'message' => Flash::message(), 
                 'errors' => Flash::errors(), 
                 'old' => Flash::old(), 
)); 
break; 

case 'paises.index':
      View::render('paises/index', array(
                 'pageTitle' => 'Menú País', 
                 'message' => Flash::message(), 
                 'success' => Flash::success(), 
      ));
      break;

case 'paises.create':
      View::render('paises/create', array(
                 'pageTitle' => 'Agregar País', 
                 'message' => Flash::message(), 
                 'success' => Flash::success(), 
                 'old' => Flash::old(),
      ));
      break;

case 'paises.store':
      $data = array(
          'nombre' => trim((string) ($_POST['nombre'] ?? '')),
          'habitantes' => trim((string) ($_POST['habitantes'] ?? '')),
          'democracia' => trim((string) ($_POST['democracia'] ?? '')),
      );

      if ($data['nombre'] === '' || $data['habitantes'] === '' || $data['democracia'] === '') {
          Flash::setErrors(array('general' => 'Completa todos los campos.'));
          Flash::setOld($data);
          Flash::setMessage('Por favor completa todos los campos.');
          View::redirect('paises.create');
      }

      Flash::setSuccess('País agregado correctamente.');
      View::redirect('paises.index');
      break;

case 'authenticate':
    // Código de autenticación aquí
    // Por ahora, redirigir a home
    View::redirect('home');
    break;

case 'logout': 
      session_destroy(); 
      header('Location: ?route=auth.login'); 
       exit; 

case 'forgot': 
    View::render('auth/forgot-password', array( 
            'pageTitle' => 'Recuperar contraseña', 
             'message' => Flash::message(), 
              'success' => Flash::success(), 
              'errors' => Flash::errors(), 
              'old' => Flash::old(), 
        )); 
break;

case 'forgot.send': 
$forgotEmail = trim(strtolower((string) ($_POST['email'] ?? ''))); 

if ($forgotEmail === '' || !filter_var($forgotEmail, FILTER_VALIDATE_EMAIL)) { 
   Flash::setErrors(array('email' => 'Introduce un correo electrónico válido.')); 
   Flash::setOld(array('email' => $forgotEmail)); 
   View::redirect('auth.forgot'); 
} 

   $repository = DependencyInjection::getUserRepository(); 
   $foundUser = $repository->getByEmail(new UserEmail($forgotEmail)); 

     if ($foundUser !== null && $foundUser->status() === UserStatusEnum::ACTIVE) {
         $tempPassword = bin2hex(random_bytes(5)); 
         $newPassword = new UserPassword($tempPassword); 
         $UpdatedUser = $foundUser->changePassword($newPassword); 
         $repository->update($UpdatedUser); 
} 

   Flash::setSuccess(
'Si el correo está registrado y la cuenta está activa, ' . 
'recibirás un mensaje con tu contraseña temporal.' 
); 

    View::redirect('auth.forgot'); 
    break; 

       default: 
           throw new RuntimeException('Acción no soportada.'); 

        } 
  } catch (Throwable $exception) { 
          $msg = $exception->getMessage(); 
          Flash::setMessage($msg); 

               switch ($route) { 
               case 'users.store': 
         Flash::setOld(getCreateUserFormData()); 
         View::redirect('users.create'); 
         break; 

         case 'users.update': 
          $updateId = trim((string) ($_POST['id'] ?? '')); 
          Flash::setOld(getUpdateUserFormData()); 
          header('Location: ?route=users.edit&id=' . urlencode($updateId)); 
         exit; 

       case 'auth.authenticate': 
            Flash::setOld(array('email' => trim(strtolower((string) ($_POST['email'] ?? ''))))); 
            header('Location: index.php?route=home');
            exit; 

    case 'auth.forgot.send': 
           Flash::setOld(array('email' => trim((string) ($_POST['email'] ?? '')))); 
           View::redirect('auth.forgot'); 
           break; 

    case 'users.show': 
    case 'users.edit': 
         View::redirect('users.index'); 
         break; 

      case 'users.delete': 
       Flash::setMessage($msg); 
       View::redirect('users.index'); 
      break; 

      default: 
          View::render('home', buildHomeViewData($msg)); 
         break; 
      } 
 }

function buildListUsersViewData(array $users): array 
{ 
     return array( 
             'pageTitle' => 'Lista de usuarios', 
             'users' => $users, 
             'message' => Flash::message(), 
             'success' => Flash::success(), 
   ); 
} 

function buildHomeViewData(string $message = ''): array 
{ 
     return array( 
               'pageTitle' => 'Menú principal', 
               'message' => $message, 
                'success' => Flash::success(), 
        ); 
} 

function buildCreateUserViewData(): array 
{ 
       return array( 
             'pageTitle' => 'Registrar usuario', 
            'roleOptions' => UserRoleEnum::values(), 
              'message' => Flash::message(), 
              'success' => Flash::success(), 
              'errors' => Flash::errors(), 
            'old' => Flash::old(), 
      ); 
} 

function buildEditUserViewData(UserResponse $user): array 
    { 
          return array( 
                'pageTitle' => 'Editar usuario', 
                'user' => $user, 
                'roleOptions' => UserRoleEnum::values(), 
                 'statusOptions' => UserStatusEnum::values(), 
                  'message' => Flash::message(), 
               'errors' => Flash::errors(), 
                'old' => Flash::old(), 
       ); 
} 

function generateUuid4(): string 
           { 
                 $data = random_bytes(16); 
                 $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
                 $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
                return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4)); 
} 

function getCreateUserFormData(): array 
     { 
            return array(
'name' => isset($_POST['name']) ? trim((string) $_POST['name']) : '', 
'email' => isset($_POST['email']) ? trim((string) $_POST['email']) : '', 
'password' => isset($_POST['password']) ? trim((string) $_POST['password']) : '', 
'role' => isset($_POST['role']) ? trim((string) $_POST['role']) : '', 
); 
} 

function getUpdateUserFormData(): array 
{ 
return array( 
        'id' => isset($_POST['id']) ? trim((string) $_POST['id']) : '', 
        'name' => isset($_POST['name']) ? trim((string) $_POST['name']) : '', 
        'email' => isset($_POST['email']) ? trim((string) $_POST['email']) : '', 
        'password' => isset($_POST['password']) ? (string) $_POST['password'] : '', 
        'role' => isset($_POST['role']) ? trim((string) $_POST['role']) : '', 
        'status' => isset($_POST['status']) ? trim((string) $_POST['status']) : '', 
    ); 
} 

function validateCreateUserForm(array $form): array 
{ 
   $errors = array(); 
            if ($form['name'] === '') { 
                $errors['name'] = 'El nombre es obligatorio.'; 
        } 
              if ($form['email'] === '') { 
                   $errors['email'] = 'El correo es obligatorio.'; 
} 
          elseif (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) { 
                    $errors['email'] = 'El correo no tiene un formato válido.'; 
} 
       if ($form['password'] === '') {  
                $errors['password'] = 'La contraseña es obligatoria.'; 
       } elseif (strlen($form['password']) < 8) { 
               $errors['password'] = 'La contraseña debe tener al menos 8 caracteres.'; 
   } 
   if ($form['role'] === '') { 
        $errors['role'] = 'El rol es obligatorio.'; 
}
return $errors; 
} 

function validateUpdateUserForm(array $form): array 
{ 
$errors = array(); 
          if ($form['name'] === '') { 
          $errors['name'] = 'El nombre es obligatorio.'; 
    } 
       if ($form['email'] === '') { 
              $errors['email'] = 'El correo es obligatorio.'; 
} elseif (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) { 
               $errors['email'] = 'El correo no tiene un formato válido.'; 
} 
if ($form['password'] !== '' && strlen($form['password']) < 8) { 
      $errors['password'] = 'La contraseña debe tener al menos 8 caracteres si deseas cambiarla.'; 
} 
if ($form['role'] === '') { 
$errors['role'] = 'El rol es obligatorio.'; 
} if ($form['status'] === '') { 
      $errors['status'] = 'El estado es obligatorio.'; 
} 
 return $errors; 
} 

