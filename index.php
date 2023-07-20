<?php
if ($_GET['page'] == "owners") {
    
}
?>

<?php include('./templates/header.php') ?>
<main>
    <h1>Список информационных систем</h1>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск по названию..">
    <div class="table-responsive-vertical shadow-z-1">
        <!-- Table starts here -->
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Ответственный</th>
                    <th>Кол-во ВМ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('./ config/connetion.php');

                //SELECT InformSystems.id, title,Owners.FIO FROM InformSystems,Owners GROUP by InformSystems.id;
                $sql = "SELECT i.id , i.title, o.FIO AS owner, COUNT(v.id) AS vm_count FROM InformSystems as i JOIN Owners as o ON i.owner = o.id LEFT JOIN VMs as v on i.id = v.id GROUP BY i.id, i.title, o.FIO;";
                if ($result = $conn->query($sql)) {
                    foreach ($result as $row) {
                        $id = $row["id"];
                        $title = $row["title"];
                        $fio = $row["owner"];
                        $count = $row["vm_count"];

                        echo "<tr class='table-element'>";
                        echo '<td data-title="ID">' . $id . '</td>';
                        echo '<td data-title="Name">' . $title . '</td>';
                        echo ' <td data-title="Link">';
                        echo '<a href="https://github.com/zavoloklom/material-design-color-palette" target="_blank">' . $fio . '</a>';
                        echo '</td>';
                        echo '<td data-title="Status">' . $count . ' шт.</td>';
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
</main>



<?php include('./templates/footer.php') ?>