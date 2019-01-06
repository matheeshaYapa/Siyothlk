<?php $panel = 'articles'; include 'admin_dashboard_frame.php'; ?>

    <div class="card">
        <div class="card">

            <h4 class="card-header">Articles Published On Website</h4>

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <br>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Timestamp</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                if(!empty($articles)) {
                    foreach($articles as $article) {
                        echo "<tr >";
                        echo "<td >$article->id</td >";
                        echo "<td >$article->title</td >";
                        echo "<td >$article->timeStamp</td >";
                        echo "<td ><a href = \"".base_url('index.php/admin/edit_article')."/$article->id\" ><i style='color: blue;' class=\"fas fa-edit\"></i></a > <a href = \"".base_url('index.php/admin/delete_article')."/$article->id\" ><i style='color: red;' class=\"fas fa-trash\"></i></a ></td >";
                        echo "</tr >";
                    }
                }
                ?>
            </table>

        </div>
    </div>

<?php include 'admin_dashboard_foot.php'; ?>