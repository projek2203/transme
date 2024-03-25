 <!--start overlay-->
 <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
       <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
     <!-- Fontawesome -->
     <script src="<?= base_url(); ?>assets/fontawesome/js/all.js"></script>
    <!-- country code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
     <!--<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>-->
    <script src="<?= base_url(); ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?= google_maps_api ?>&callback=initMap" async defer></script>
<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places">
</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?= google_maps_api ?>&sensor=false&libraries=places'></script>
<script src="<?= base_url(); ?>assets/js/locationpicker.jquery.js"></script>
  <!--app-->
  <script src="<?= base_url(); ?>assets/js/app.js"></script>
  <script src="<?= base_url(); ?>assets/js/index.js"></script>

  <script>
     new PerfectScrollbar(".best-product")
     new PerfectScrollbar(".top-sellers-list")
  </script>
<Script>
$(function() {
	"use strict";

	
// chart 1
var options = {
    series: [
      {
        name: "Merchant",
        data: [<?= $jan4[0]['jumlah'] ?>,
                <?= $feb4[0]['jumlah'] ?>,
                <?= $mar4[0]['jumlah'] ?>,
                <?= $apr4[0]['jumlah'] ?>,
                <?= $mei4[0]['jumlah'] ?>,
                <?= $jun4[0]['jumlah'] ?>,
                <?= $jul4[0]['jumlah'] ?>,
                <?= $aug4[0]['jumlah'] ?>,
                <?= $sep4[0]['jumlah'] ?>,
                <?= $okt4[0]['jumlah'] ?>,
                <?= $nov4[0]['jumlah'] ?>,
                <?= $des4[0]['jumlah'] ?>]
    },
    {
        name: "Kurir",
        data: [<?= $jan2[0]['jumlah'] ?>,
                <?= $feb2[0]['jumlah'] ?>,
                <?= $mar2[0]['jumlah'] ?>,
                <?= $apr2[0]['jumlah'] ?>,
                <?= $mei2[0]['jumlah'] ?>,
                <?= $jun2[0]['jumlah'] ?>,
                <?= $jul2[0]['jumlah'] ?>,
                <?= $aug2[0]['jumlah'] ?>,
                <?= $sep2[0]['jumlah'] ?>,
                <?= $okt2[0]['jumlah'] ?>,
                <?= $nov2[0]['jumlah'] ?>,
                <?= $des2[0]['jumlah'] ?>]
    },
    {
        name: "Rental",
        data: [<?= $jan3[0]['jumlah'] ?>,
                <?= $feb3[0]['jumlah'] ?>,
                <?= $mar3[0]['jumlah'] ?>,
                <?= $apr3[0]['jumlah'] ?>,
                <?= $mei3[0]['jumlah'] ?>,
                <?= $jun3[0]['jumlah'] ?>,
                <?= $jul3[0]['jumlah'] ?>,
                <?= $aug3[0]['jumlah'] ?>,
                <?= $sep3[0]['jumlah'] ?>,
                <?= $okt3[0]['jumlah'] ?>,
                <?= $nov3[0]['jumlah'] ?>,
                <?= $des3[0]['jumlah'] ?>]
    },
    {
        name: "Transportasi",
        data: [<?= $jan1[0]['jumlah'] ?>,
                <?= $feb1[0]['jumlah'] ?>,
                <?= $mar1[0]['jumlah'] ?>,
                <?= $apr1[0]['jumlah'] ?>,
                <?= $mei1[0]['jumlah'] ?>,
                <?= $jun1[0]['jumlah'] ?>,
                <?= $jul1[0]['jumlah'] ?>,
                <?= $aug1[0]['jumlah'] ?>,
                <?= $sep1[0]['jumlah'] ?>,
                <?= $okt1[0]['jumlah'] ?>,
                <?= $nov1[0]['jumlah'] ?>,
                <?= $des1[0]['jumlah'] ?>]
    }
  ],
    chart: {
        foreColor: '#9a9797',
        type: "area",
        //width: 130,
        height: 370,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff", "#12bf24","#32BFFF","#FFCB32"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    grid: {
        show: true,
    },
    stroke: {
        show: !0,
        width: 3,
        curve: "smooth"
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#3461ff", "#12bf24","#32BFFF","#FFCB32"],
          inverseColors: true,
          opacityFrom: 0.8,
          opacityTo: 0.2,
        }
      },
    colors: ["#3461ff", "#12bf24","#32BFFF","#FFCB32"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardchart"), options);
  chart.render();



// chart 2
  
var options = {
    series: [<?= count($trxproses) ?>, <?= count($trxbatal) ?>, <?= count($trxsukses) ?>],
    chart: {
     height: 250,
     type: 'pie',
  },
  labels: [ 'Baru', 'Batal', 'Selesai'],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.5,
      gradientToColors: ["#00c6fb", "#ff6a00", "#98ec2d"],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      //stops: [0, 50, 100],
      //colorStops: []
    }
  },
  colors: ["#005bea", "#ee0979", "#17ad37"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 270
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#dashboardstatic"), options);
  chart.render();

  

// chart 3
  
var options = {
    series: [89, 45, 35, 62],
    chart: {
    width: 340,
    type: 'donut',
  },
  labels: ["Visitors", "Subscribers", "Contributor", "Author"],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.5,
      gradientToColors: ["#667eea", "#00c6fb", "#f77062", "#98ec2d"],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      //stops: [0, 50, 100],
      //colorStops: []
    }
  },
  colors: ["#764ba2", "#005bea", "#fe5196", "#12bf24"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 260
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();




// chart 4

var options = {
    series: [{
        name: "Views",
        data: [450, 650, 440, 160, 940, 414, 555, 257]
    },{
        name: "Clicks",
        data: [580, 350, 760, 350, 850, 352, 785, 241]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "bar",
        //width: 130,
        height: 280,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3361ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3361ff"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "40%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 0,
        curve: "smooth"
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#005bea", "#ff0080"],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          //stops: [0, 50, 100],
          //colorStops: []
        }
      },
    colors: ["#348bff", "#ff00ab"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();



  
   // world map
	
	jQuery('#geographic-map').vectorMap({
		map: 'world_mill_en',
		backgroundColor: 'transparent',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		zoomOnScroll: false,
		color: '#009efb',
		regionStyle: {
			initial: {
				fill: '#6c757d'
			}
		},
		markerStyle: {
			initial: {
				r: 9,
				'fill': '#fff',
				'fill-opacity': 1,
				'stroke': '#000',
				'stroke-width': 5,
				'stroke-opacity': 0.4
			},
		},
		enableZoom: true,
		hoverColor: '#009efb',
		markers: [{
			latLng: [21.00, 78.00],
			name: 'I Love My India'
		}],
		series: {
			regions: [{
				values: {
					IN: '#8833ff',
					US: '#3461ff',
					RU: '#12bf24',
					AU: '#ffb207'
				}
			}]
		},
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: [],
		showTooltip: true,
		onRegionClick: function (element, code, region) {
			var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
			alert(message);
		}
	});
    $(document).ready(function() {
        $('#Transaction-History').DataTable({
           lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
        });
     } );
     new PerfectScrollbar(".new-customer-list")
});
</script>
<script type="text/javascript">
  $(document).ready( function () {
  var table = $('#dashboard-trx').DataTable({
    pageLength: 10,
    responsive: true,
    responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [
          {className: "td-text-center", targets: "_all"},
          {width    : "1px", targets: [0]},
          {width    : "5px", targets: [3, 5, 6]}
        ]
  });
new $.fn.dataTable.FixedHeader( table );
} );
</script>
<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#tbaktif, #tbnon, #tbblock').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
        });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
          var tabID = $(event.target).attr('data-bs-target');
          if ( tabID === '#successhome' ) {
            table2.columns.adjust().responsive.recalc();
          }
          if ( tabID === '#successprofile' ) {
            table2.columns.adjust().responsive.recalc();
          }
          if ( tabID === '#successcontact' ) {
            table2.columns.adjust().responsive.recalc();
          }
        });
      });
});
</script>

<script>
$(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#promotable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#promotable_wrapper .col-md-6:eq(0)' );
    } );
    table.columns.adjust().draw();

});
</script>
<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#bannertable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            columnDefs: [
              {className: "td-text-center", targets: "_all"},
              {width    : "5px", targets: [0, 6, 7]}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#dashtable_wrapper .col-md-6:eq(0)' );
    } );


});
</script>
<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#fiturtable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            columnDefs: [
              {className: "td-text-center", targets: "_all"}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#dashtable_wrapper .col-md-6:eq(0)' );
    } );
});
</script>
<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dashtable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            columnDefs: [
              {className: "td-text-center", targets: "_all"},
              {width    : "250px", targets: [2, 3]},
              {width    : "5px", targets: [0, 1, 4, 5, 6, 7,8]}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#dashtable_wrapper .col-md-6:eq(0)' );
    } );
});
</script>
<script>
  $(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dashtable2').DataTable( {
            dom: 'Bfrtip',
            lengthChange: true,
            responsive: true,
            pageLength: 20,
            buttons: [
              {
                extend: 'copy',
                text: 'Salin',
                exportOptions: {
                  columns: [ 0, 2, 3, 4, 5, 6, 7 ]
                }
              },
              {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                  columns: [ 0, 2, 3, 4, 5, 6, 7 ]
                }
              },
              {
                extend: 'pdf',
                text: 'Pdf',
                messageTop: 'Daftar Transaksi',
                download: 'open',
                exportOptions: {
                  columns: [ 0, 2, 3, 4, 5, 6, 7 ]
                }
              },
              {
                extend: 'print',
                text: 'Cetak',
                exportOptions: {
                  columns: [ 0, 2, 3, 4, 5, 6, 7 ]
                }
              }
            ],
            select: true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"},
              {width    : "250px", targets: [2, 3]},
              {width    : "5px", targets: [0, 1, 4, 5, 6, 7,8]}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container().appendTo( '#dashtable2_wrapper .col-md-6:eq(0)' );
    } );


});
</script>
<script>
function previewFile() {
  var preview = document.querySelector('foto_sim');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>
<script type="text/javascript">
    $(function() {
        var code = "+62"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['ID'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>
<script>
$(document).ready(function() {
var table1 = $('#dtable').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table2 = $('#dtable2').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table3 = $('#dtable3').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table4 = $('#dtable4').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table5 = $('#dtable5').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
  var tabID = $(event.target).attr('data-bs-target');
  if ( tabID === '#tab1' ) {
    table2.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab2' ) {
    table2.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab3' ) {
    table3.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab4' ) {
    table4.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab5' ) {
    table5.columns.adjust().responsive.recalc();
  }
} );
} );
</script>
<script type="text/javascript">
    $(function() {
        var code = "+62"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['ID'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>
<script>
$(document).ready(function() {
var table1 = $('#newstable1').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"}
            ]
} );
var table2 = $('#newstable2').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"}
            ]
});
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
  var tabID = $(event.target).attr('data-bs-target');
  if ( tabID === '#newstab1' ) {
    table1.columns.adjust().responsive.recalc();
  }else if ( tabID === '#newstab2' ) {
    table2.columns.adjust().responsive.recalc();
  }
});
} );
</script>
<script>
$(document).ready(function() {
var table1 = $('#wttable1').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"}
            ]
} );
var table2 = $('#wttable2').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"}
            ]
});
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
  var tabID = $(event.target).attr('data-bs-target');
  if ( tabID === '#newstab1' ) {
    table1.columns.adjust().responsive.recalc();
  }else if ( tabID === '#newstab2' ) {
    table2.columns.adjust().responsive.recalc();
  }
});
} );
</script>
<script>
$(document).ready(function() {
var table1 = $('#dptable1').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table2 = $('#dptable2').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table3 = $('#dptable3').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table4 = $('#dptable4').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table5 = $('#dptable5').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
  var tabID = $(event.target).attr('data-bs-target');
  if ( tabID === '#tab1' ) {
    table1.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab2' ) {
    table2.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab3' ) {
    table3.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab4' ) {
    table4.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab5' ) {
    table5.columns.adjust().responsive.recalc();
  }
} );
} );
</script>
<script>
$(document).ready(function() {
var table1 = $('#merctable1').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table2 = $('#merctable2').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]},
              {width    : "auto", targets: [2, 3, 4, 7]},
              {width    : "5px", targets: [5, 6]}
            ]
} );
var table3 = $('#merctable3').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]}
            ]
} );
var table4 = $('#merctable4').DataTable( {
  lengthChange: true,
  responsive: true,
  pageLength: 5,
  fixedColumns: true,
  fixedHeader:true,
  columnDefs: [
              { responsivePriority: 1, targets: 0 },
              {className: "td-text-center", targets: "_all"},
              {width    : "1px", targets: [0, 1]}
            ]
} );
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
  var tabID = $(event.target).attr('data-bs-target');
  if ( tabID === '#tab1' ) {
    table1.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab2' ) {
    table2.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab3' ) {
    table3.columns.adjust().responsive.recalc();
  }else if ( tabID === '#tab4' ) {
    table4.columns.adjust().responsive.recalc();
  }
} );
} );
</script>
<script>
$(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dpdetailtrx').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 10,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"}
            ]
        });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        var tabID = $(event.target).attr('data-bs-target');
        if ( tabID === '#tab4' ) {
          table.columns.adjust().draw();
          table.columns.adjust().responsive.recalc();
        }
      });
    });
});
</script>
<script>
$(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dpdetailwallet').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 10,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"}
            ]
        });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        var tabID = $(event.target).attr('data-bs-target');
        if ( tabID === '#tab5' ) {
          table.columns.adjust().draw();
          table.columns.adjust().responsive.recalc();
        }
      });
    });
});
</script>

<script>
$(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#dproftrx').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"}
            ]
        });
        $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        var tabID = $(event.target).attr('data-bs-target');
        if ( tabID === '#tab4' ) {
          table.columns.adjust().draw();
          table.columns.adjust().responsive.recalc();
        }
      });
    });
});
</script>
<script>
$(function() {
	"use strict";
      $(document).ready(function() {
        var table = $('#pakettable').DataTable( {
            lengthChange: true,
            responsive: true,
            pageLength: 5,
            fixedColumns: true,
            fixedHeader:true,
            columnDefs: [
              {className: "td-text-center", targets: "_all"},
              {width    : "5px", targets: [0]}
            ]
        } );
        new $.fn.dataTable.FixedHeader( table );
        table.buttons().container()
        .appendTo( '#pakettable_wrapper .col-md-6:eq(0)' );
    } );
    table.columns.adjust().draw();
});
</script>

</body>
</html>