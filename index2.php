<?php
  function getURL() {
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    // $res = '';
    foreach ($uri as $key => $val) {
      // echo $key . ' - ' . $val . '<br />';
      // if ($val) {
        $res[$key] = $val;
      // }
    }
    return $res;
  }
?>
<html>
<head>
<title>About Us</title>
</head>
<body>
  <h1>Test</h1>

  <?php
    echo "Test rewrite rules<br />";

    $url = getURL(); // echo getURL()[0];

    echo $url[1];
  ?>
</body>
</html>
