<?php
if (isset($_GET['search'])) {
    echo "<script>let search = '" . $_GET['search'] . "';</script>";
}

?>

<h1>Список ответственных за информационные системы</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск по названию..">
<div class="table-responsive-vertical shadow-z-1">
    <!-- Table starts here -->
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия, имя, ответсво</th>
                <th>Системы</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./ config/connetion.php');

            //SELECT InformSystems.id, title,Owners.FIO FROM InformSystems,Owners GROUP by InformSystems.id;
            $sql = "SELECT Owners.id, Owners.FIO, GROUP_CONCAT(InformSystems.title SEPARATOR ',') AS titles FROM Owners JOIN InformSystems ON Owners.id = InformSystems.owner GROUP BY Owners.FIO ORDER by Owners.id;";
            if ($result = $conn->query($sql)) {
                foreach ($result as $row) {
                    $id = $row["id"];
                    $title = $row["FIO"];
                    $fio = $row["titles"];
                    echo "<tr class='table-element'>";
                    echo '<td data-title="ID">' . $id . '</td>';
                    echo '<td data-title="Name">' . $title . '</td>';
                    echo ' <td data-title="Link">';
                    $myArray = explode(',', $fio);
                    foreach ($myArray as $el) {
                        echo '<a href="?page=is&search=' . $el . '" target="_blank">' . $el . '</a>';
                        echo '  ,  ';
                    }

                    echo '</td>';
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function myFunction() {
        // Объявить переменные
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");

        // Перебирайте все строки таблицы и скрывайте тех, кто не соответствует поисковому запросу
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            console.log(td)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    input = document.getElementById("myInput");
    input.value = search;
    myFunction();
</script>