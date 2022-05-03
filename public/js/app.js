let btn_delete = document.querySelectorAll('.btn-delete');
btn_delete.forEach(function(button){
  button.addEventListener('click', function(event){
    event.preventDefault();
    if(confirm('Are you sure want to delete company?'))
    {
      let form = document.getElementById('delete-form');
      let action = this.getAttribute('href');
      form.setAttribute('action', action);
      form.submit();
    }
  })
})

let filter_company_id = document.getElementById("filter_company_id");
if(filter_company_id){
  filter_company_id.addEventListener('change', function(){
    let company_id = this.value;
    window.location.href = window.location.href.split("?")[0]+"?company_id="+company_id
  })
}


$(".btn-clear").click(function(){
  let query = location.search;
  window.location.href = window.location.href.split("?")[0];
  $("#search").val("");
  $("#filter_company_id").val("0");
})
