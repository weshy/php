<div class="container">
    <div class="page-header">
        <h1 class="page-title">Таблица умножения</h1>
    </div>
    <form action="/index.php?page=table" method="POST">
        <input type="number" name="columns" min="2" max="22" defaultvalue="11" value="13">
        <input type="number" name="rows" min="2" max="22" defaultvalue="11" value="13">
        <input type="color" name="color" defaultvalue="#336699" value="#336699">
        <button> show </button>
    </form>
        <?php   table($columns,$rows,$color);
                historyShow($m_table_cookie);
        ?>
</div>