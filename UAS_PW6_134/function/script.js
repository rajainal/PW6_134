$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });

// galeri gambar menggunakan plugin "lightSlider". Kode ini mengatur slider untuk secara otomatis menyesuaikan lebar gambar, berulang, dan menghilangkan kelas "cS-hidden" dari slider.