<div class="col-sm-12">
  <!-- Обычные кнопки -->
  <button type="button" class="btn btn-warning">Обычная кнопка</button>
  <div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">
      Кнопка с выпадающим меню 
      <span class="caret"></span>
    </button>
    <!-- Выпадающее меню -->
    <ul class="dropdown-menu">
      <!-- Пункты меню -->
      <li><a href="#">Пункт 1</a></li>
    </ul>
  </div>
  <!-- Кнопка с выпадающим меню -->
  <div class="btn-group">
    <button type="button" data-toggle="dropdown" class="btn btn-info dropdown-toggle">
      Важное 
      <span class="caret"></span>
    </button>
    <!-- Выпадающее меню -->
    <ul class="dropdown-menu">
      <!-- Пункты меню -->
      <li><a href="{{ route('documents')}}">Документы</a></li>
      <li><a href="#">Пункт 2</a></li>
      <li class="divider"></li>
      <li><a href="#">Пункт 3</a></li>
    </ul>
  </div>
</div>