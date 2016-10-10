<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>注册</title>
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
      <form class="content" action="regist.php" method="post">
      <h1>请输入您的信息</h1>
      用户名：<input type="text" name="uname"><br>
      密码：  <input type="text" name="pwd"><br>
      地区：  <input type="text" name="local"><br>
      短信验证：<input type="text" name="xx" style="width:80px">
      <button type="button" name="button">点击获取验证码</button>
      <br>
      <input type="submit" value="提交">
      <input type="reset" value="重置">
      </form>
  </body>
</html>
