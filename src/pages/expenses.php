<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css" />
  </head>
  <body>
    <section class="main-container">
      @@include("../blocks/header.php")

      <main class="main">
        @@include("../blocks/form-expenses.html")
        @@include("../blocks/chart-expenses.html")
        @@include("../blocks/form-edit-category-expenses.html")
      </main>

      @@include("../blocks/footer.html")
    </section>
  </body>
</html>
