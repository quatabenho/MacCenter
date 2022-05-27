<script>
    function xoadanhmuc(){
        var conf=confirm("Bạn có chắc muốn xóa danh mục?");
        return conf;
    }
</script>
<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else {
    $page=1;

}
$rowsPerPage=12;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$sql = "SELECT * FROM dmsanpham ORDER BY id_dm ASC LIMIT $perRow,$rowsPerPage";
$query = mysqli_query($conn, $sql);
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT *FROM dmsanpham"));
$totalPages = ceil($totalRows/$rowsPerPage ) ;

$listPage="";
for($i=1;$i<=$totalPages;$i++){
    if ($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý danh mục</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themdm" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm danh mục mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên danh mục</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td data-checkbox="true"><?php echo $row['id_dm']; ?></td>
                                <td data-checkbox="true"><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><?php echo $row['ten_dm']; ?></a></td>
                                <td>
                                    <a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </svg></span></a>
                                </td>
                                <td>
                                    <a onclick="return xoadanhmuc();" href="chucnang/danhmuc/xoadm.php?id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </svg></span></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <?php
                    echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/.row-->