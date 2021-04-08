<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>SQL Heroes Admin Page</title>
  </head>
  <body>
    <h1>SQL Heroes</h1>

    <!-- Optional JavaScript; choose one of the two! -->
    <div class="container">
      <div class="row">
        <div class="col-4">
          <h1>
            Menu
          </h1>
          <ul>
            <li><a href="/api.php?route=getAllHeroes" target="_blank">Get All Heroes</a></li>
            <li><a href="/api.php?route=getHeroByID&hero_id=5" target="_blank">Get Hero By ID</a></li>
            <li><a href="/api.php?route=resetReboots" target="_blank">Reset Reboots</a></li>
            <li><a href="/api.php?route=addRebootToHero&hero_id=2&reboots=3" target="_blank">Add Reboots to Hero</a></li>
            <li><a href="/api.php?route=createHero" target="_blank">Add Impeccable Ian as Hero</a></li>
            <li><a href="/api.php?route=deleteHero" target="_blank">Delete Impeccable Ian as Hero</a></li>
<!--             <li><a href="/api.php?route=createBattle&hero1=1&hero2=2&winner=1" target="_blank">Create Battle</a></li> -->
          </ul>
          
        </div>
      </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>