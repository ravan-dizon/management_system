        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <script>
            $(document).ready(function(){
                
                $('.del_btn').click(function (e){
                    e.preventDefault();

                    var stud_id = $(this).closest('tr').find('.stud_id').text();
                    // console.log(stud_id);
                    $('#delete_id').val(stud_id);
                    $('#deleteStudentModal').modal('show');
                });
                $('.satff_del_btn').click(function (e){
                    e.preventDefault();

                    var stud_id = $(this).closest('tr').find('.staff_id').text();
                    // console.log(stud_id);
                    $('#delete_id').val(stud_id);
                    $('#deletestaffModal').modal('show');
                });
             });
        </script>
    </body>
</html>