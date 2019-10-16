$('#deleteModal').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    
    modal.find('.modal-title').text('Delete Data '+ name + ' ?');
    modal.find('.modal-body #deleteID').val(id);
})

$('#editModal').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var id = button.data('id')
    var bidang = button.data('bidang')
    var prodi = button.data('prodi')
    var role = button.data('role')
    var name = button.data('name')
    var email = button.data('email')
    var pass = button.data('pass')
    var nim = button.data('nim')
    var angkatan = button.data('angkatan')
    var telp = button.data('telp')
    var alamat = button.data('alamat')
    var ava = button.data('avatar')
    var modal = $(this)

    modal.find('.modal-title').text('Edit Data '+ name);
    modal.find('.modal-body #editID').val(id);
    modal.find('.modal-body #recipient-bidang').val(bidang);
    modal.find('.modal-body #recipient-prodi').val(prodi);
    modal.find('.modal-body #recipient-role').val(role);
    modal.find('.modal-body #recipient-name').val(name);
    modal.find('.modal-body #recipient-email').val(email);
    modal.find('.modal-body #recipient-pass').val(pass);
    modal.find('.modal-body #recipient-nim').val(nim);
    modal.find('.modal-body #recipient-angkatan').val(angkatan);
    modal.find('.modal-body #recipient-no_telp').val(telp);
    modal.find('.modal-body #recipient-alamat').val(alamat);
    modal.find('.modal-body #recipient-ava').val(ava);
})