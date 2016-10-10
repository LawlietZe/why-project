<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>个人主页</title>
    <style media="screen">
    .content{
      width: 400px;
      height: 400px;
      background: #fff;
      background: #cdcdcd;
      margin: 0 auto;
      padding: 5px;
    }
    </style>
  </head>
  <body>
    <div class="content">
      <?php
      $servername = "192.168.0.106"; //获取数据库信息
      $username = "root";
      $password = "123123";
      $name = $_POST['uname'];   //从页面获取用户名和密码
      $passwd = $_POST['pwd'];
      try {
          $conn = new PDO("mysql:host=$servername;dbname=xyt_db", $username, $password);//PDO链接
          $conn->query('SET NAMES utf8'); //设置字符编码
          session_start();//session开始
          $sql = "select id from user_msg where user_name = '".$name."' and passwd = '".$passwd."'";
          $res = $conn->query($sql);  //执行一条sql语句
          // $rs = $res->fetchAll();
          $rs = $res->fetch();//
          // var_dump($rs);
          if($rs){
            $_SESSION['username']=$name;    
            $_SESSION['id']=$rs['id'];
            echo 'ID编号：'.$rs['id']."<br/>用户:<h3>".$name,'</h3> 欢迎你！进入用户管理系统<br />';
            echo '点击此处 <a href="index.html">主页</a> 回到上一页！<br />';
            echo '点击此处 <a href="modifyPre.php">修改</a> 修改您的信息<br />';
          }else{
            echo '登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
          }

        }
      catch(PDOException $e)
      {
          echo $e->getMessage();
      }
      ?>

    </div>
  </body>
</html>
