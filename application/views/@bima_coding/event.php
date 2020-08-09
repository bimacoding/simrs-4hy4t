
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

<link href='<?=base_url()?>assets/lib/main.css' rel='stylesheet' />
 <script src="<?=base_url()?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src='<?=base_url()?>assets/lib/main.js'></script>
<style type="text/css">
  .fc-daygrid-block-event .fc-event-title {
    padding: 1px;
    white-space: pre-wrap; /* css-3 */    
    white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
    white-space: -pre-wrap; /* Opera 4-6 */    
    white-space: -o-pre-wrap; /* Opera 7 */    
    word-wrap: break-word; /* Internet Explorer 5.5+ */ 
  }
</style>
<?php 
    error_reporting(0);
    // header("Content-Type: application/json; charset=UTF-8");

    $sql = "SELECT a.id_pemeliharaan as idnya, c.nama_alat AS nm_alat,a.tgl_pm AS tgl,'pemeliharaan 1' AS pm,'red' as color FROM t_jadwalpemeliharaan a LEFT JOIN t_inv b ON a.id_inv=b.id_inv LEFT JOIN t_alat c ON b.id_alat=c.id_alat
UNION ALL
SELECT a.id_pemeliharaan, c.nama_alat,a.tgl_pm2,'pemeliharaan 2','orange' FROM t_jadwalpemeliharaan a LEFT JOIN t_inv b ON a.id_inv=b.id_inv LEFT JOIN t_alat c ON b.id_alat=c.id_alat
UNION ALL
SELECT a.id_pemeliharaan, c.nama_alat,a.tgl_pm3,'pemeliharaan 3','blue' FROM t_jadwalpemeliharaan a LEFT JOIN t_inv b ON a.id_inv=b.id_inv LEFT JOIN t_alat c ON b.id_alat=c.id_alat";
    $qu = $this->db->query($sql);
    $event = '';
    $tgl = date('Y-m-d');
    foreach ($qu->result_array() as $key ) {
      $event .= '{"title": "Maintenace '.$key['nm_alat'].' '.$key['pm'].'",';
        $event .= '"start": "'.$key['tgl'].'",';
        $event .= '"url": "'.base_url().'pemeliharaan/update_pemeliharaan/'.$key['idnya'].'",';
        $event .= '"color": "'.$key['color'].'"},';
      
      
    }
    $gg = substr($event,0,-1);
    $rr = $gg;
?>
<script>
  var bv = '[<?=$rr?>]';
  // var dfg = JSON.stringify(bv);
  // console.log(dfg);
  var pp = $.parseJSON(bv);
  console.log(pp);
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      expandRows: true,
      slotMinTime: '08:00',
      slotMaxTime: '20:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: '<?php echo date('Y-m-d')?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: pp,
      eventClick: function(event) {
    if (event.event.url) {
      event.jsEvent.preventDefault()
      window.open(event.event.url, "_blank");
    }
  }
    });

    calendar.render();
  });

</script>
<style>

  html, body {
    overflow: hidden; /* don't do scrollbars */
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }

  .fc-popover-body {
    background-color: #374559;
  }

  .fc-popover-header {
    background: var(--fc-neutral-bg-color, rgba(57, 57, 57, 0.3));
  }

</style>
</head>
<body>

  <div id='calendar-container'>
    <div id='calendar' style="color: #fff"></div>
  </div>

</body>
</html>
