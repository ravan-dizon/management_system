const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

$(document).ready(function(){
				
//DELETE FUNCTION
	$('.del_btn').click(function (e){
		e.preventDefault();

		var stud_id = $(this).closest('tr').find('.stud_id').text();
		// console.log(stud_id);
		$('#delete_id').val(stud_id);
		$('#deleteStudentModal').modal('show');
	});
//END OF DELETE

	//READ/VIEW FUNCTION
	$('.view_btn').click(function(e){
		e.preventDefault();

		var stud_id = $(this).closest('tr').find('.stud_id').text();
		// console.log(stud_id);

			$.ajax({
			type: "POST",
			url: "function.php",
			data: {
			'checking_viewbtn':true,
			'student_id': stud_id,

			},

			success: function(response){
			$('.student_viewing_data').html(response);
			$('#studentViewModal').modal('show');
			}
		});
	});
});

