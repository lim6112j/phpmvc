# TheCheat Api Center
## 템플릿 사용 프로젝트 시작
* composer create-project -s dev lim6112j/apicenter newProject
## 새로운 페이지 추가 방법 
  * [document root]/index.php에 추가할 페이지 route를 추가한다. 아래와 같이 하면 /newpage, /newpage.php 두가지로 접속이 가능하다.
  ```
  // http://localhost/newpage로 요청이오면 SiteController에 있는 newpage 함수를 실행하라.
  $app->router->get('/newpage', [SiteController::class, 'newpage']); 
  $app->router->get('/newpage.php', [SiteController::class, 'newpage']);
  ```
  * SiteController.php를 열어 아래와 같이 함수를 추가한다.
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
  * SiteController가 관장하는  api들을 위해 새로운 인증을 추가하여 api인증을 막고자 할때 결과를 보여주기 전에 새로운 미들웨어를 거치도록 한다.
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

  * 이제 SiteController가 관리하는 api는 NewMiddleware의 execute함수가 실행된 이후에 response 를 보낸다.
  * 모든 middleware는 리턴값이 array이며 해당 어레이를 데이터 소스로 쓸수 있다.

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
## Database관련 query추가 
  * 모든 DB 관련함수는 /models 폴더안에 모여있다.
  * $db variable은 singleton으로 만들어져 resquest-> response가 끝날 때까지 하나를 가지고 재사용한다.
  * ORM은 현재 사용할 필요 없어보인다.
  * PDO를 사용하며  bindValue를 이용해 사용하면 좋습니다.

## middleware 는 singleton으로 만든다.
 * 하나의 request에 대해 response가 만들어지기전 api 등을 호출하게되면 controller가 달라지면서 middleware를 새로 injecting하므로 다시 instance화 하는 것을 방지한다.

