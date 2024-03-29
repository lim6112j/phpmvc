# TheCheat simple mvc framework
## 사용법
### 서버 세팅
* pretty url 세팅을 위해 rewritable 옵션 enable
* .htaccess파일 생성
* public 폴더에 .htaccess파일 배치
* 서버 따라 설정 다를 수 있음.
### 템플릿 사용 프로젝트 시작
* composer 설치
* node 설치
* 서버 www, htdocs 등 serving 가능한 폴더로 이동하여 아래 명령 실행. (newProject에 자신의 프로젝트명을 작성)
```
composer create-project -s dev lim6112j/apicenter newProject
```
* ./newProject/dist 폴더를 document root로 서버 설정. (npm run build 후 자동 생성됨.)
* terminal 에서 newProject폴더에 들어가 composer update, npm  실행
```shell
composer update
npm install
npm run build
```
* localhost  실행 여부 확인.

## 새로운 페이지 추가 방법 
  * [document root]/index.php에 추가할 페이지 route를 추가한다. 아래와 같이 하면 /newpage, /newpage.php 두가지로 접속이 가능하다.
  
```
  // http://localhost/newpage로 요청이오면 DefaultController에 있는 newpage 함수를 실행하라.
  $app->router->get('/newpage', [DefaultController::class, 'newpage']); 
  $app->router->get('/newpage.php', [DefaultController::class, 'newpage']);
  ```

  * DefaultController.php를 열어 아래와 같이 함수를 추가한다.
  ```
      public function newpage(): string
    {
        $params = ['name' => 'the cheat'];
        return $this->render('newpage', $params); // views 폴더에서 newpage.php를 찾아 렌더링.
    }
  ```

  * /views 폴더에 아래에 rendering될 newpage.php 파일을 만들어준다.
  * $params로 전달된 $name 변수에 값이 표시된다.
  ```
  <h1>Hello <?php echo $name ?></h1>
  ```
## 새로운 middleware를 추가하는 방법 - NewMiddleware
  * DefaultController가 관장하는  api들을 위해 새로운 인증을 추가하여 api인증을 막고자 할때 결과를 보여주기 전에 새로운 미들웨어를 거치도록 한다.
  * /middleware 에 NewMiddleware.php 파일을 만든다
  ```
  <?php
  namespace app\middlewares;
  use app\core\BaseMiddleware;
  
  class NewMiddleware extends BaseMiddleware
  {
   //BaseMiddleware에서 상속된 필수 구현 함수.
    public function execute()
    {
      if(something wrong) {
        exit;
      }
    }
  }
  ```
  * index.php의 routing 정보에 아래와 같이 추가해준다. 
  ```
$app->router->get('/', [DefaultController::class, 'home'],[LoginMiddleware::class, NewMiddleware::class]);
  ```

  * 위의 코드에서 LoginMiddleware에서 생성한 데이터를 NewMiddleware에서 사용할 수 있다. 왼쪽에서 오른쪽 방향으로 데이터 전달.
  * 이제 DefaultController가 관리하는 api는 NewMiddleware의 execute함수가 실행된 이후에 response 를 보낸다.
  * 모든 middleware는 데이터 소스로 쓸수도 있다.

```
class AuthMiddleware extends BaseMiddleware
{
    protected static $_instance = null;

    public static function getInstance()
    {
        if (static::$_instance === null)
        {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
    public function execute():array
    {
        $login_array['now_year'] = date("Y");
        $login_array['now_month'] = date("m");
        return $login_array;
        
    }
}
```
  * 위소스는 $login_array를 페이지에서 사용할 수 있다.
  *  execute 함수 내에 redirection 넣어 인증용도로 사용할 수도 있다.
```phpt
    public function execute($data=[]):array
    {
        ($data['member_uid'] && $data['member_uid']>0)
            ?: header('Location:/login');
        return $data;
    }

```
## Database관련 query추가 
  * DB setting data는 config.php에서 가져온다.
  * 모든 DB 관련함수는 /models 폴더안에 모여있다.
  * $db variable은 singleton으로 만들어져 resquest-> response가 끝날 때까지 하나를 가지고 재사용한다.

## middleware 는 BaseMiddleware를 상속받아 singeton으로 사용함. 
 * 하나의 request에 대해 response가 만들어지기전 api 등을 호출하게되면 controller가 달라지면서 middleware를 새로 injecting하므로 다시 instance화 하는 것을 방지한다.
 * middle웨어는 반드시 array를 리턴해야한다. 리턴할 값이 없으면 아래와 같이라도 써주자.
```phpt
...
return [];
```
