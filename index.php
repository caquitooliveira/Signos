<?php include __DIR__ . "/layouts/header.php"; ?>

<div class="card p-4 shadow-lg text-center">
  <h2>Descubra seu Signo Zodiacal</h2>
  <p>Digite sua data de nascimento abaixo para descobrir seu signo:</p>

  <form action="show_zodiac_sign.php" method="POST" class="mt-4">
    <div class="mb-3">
      <input type="date" name="data" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Consultar Signo</button>
  </form>
</div>

</div> <!-- fechamento container do header.php -->
</body>
</html>
