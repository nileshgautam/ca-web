function dataTable(th = [], data = [], keys = [], title = '', addbtn = false) {
  //Data Table
  let html = `<div class="card">
    <div class="card-header">
      <h3 class="card-title">${title}</h3>
      ${addbtn ? '<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add</button>' : ""}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>`;
  for (let i = 0; i < th.length; i++) {
    html += `<th>${th[i]}</th>`;
  }

  html += `</tr>
        </thead>
        <tbody>`;
  for (let j = 0; j < data.length; j++) {
    html += `<tr>`;

    for (let k = 0; k < keys.length; k++) {
      html += `<td>${data[j][keys[k]]}</td>`;
    }
    html += `<td class="action-icons"><i class="fas fa-trash " data-id='${data[j].id}' id="delete"></i>
                 <i class="far fa-edit " data-id='${data[j].id}' id="edit"></i></td>`;
    html += `</tr>`;
  }

  html += `</tbody>        
      </table>
    </div>
    <!-- /.card-body -->
  </div>`;

  //Modal for table if it have 

  html += `<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">${'Add ' + title}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form id="form">
      <div class="form-group">
        <label data-label = '${title}'>${title} Name</label>
        <input type="text" name="name" class="form-control" required placeholder="Enter ...">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" id="save">Save</button>
    </div>
  </div>
</div>
</div>`

  $('#dataCom').html(html);

  $(function () {
    $('#example2').DataTable({

      "autoWidth": false,
      "responsive": true,
    });
  });
}
$(document).ready(function () {
  $('#dataCom').on('click', '#save', function () {
    let label = $('#form label').attr('data-label');
    if (label == 'Countries') {
      add('form', 'Admin/addCountries')
    } else if (label == 'Categories') {
      add('form', 'Admin/addCategories')
    }

  });

});
