<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?=base_url();?>">IPSRS</a> 
</div>
<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
 <?=$this->mylibrary->greeting()?> : <?= $this->session->userdata('nama'); ?> &nbsp; <a href="<?=base_url().'siteman/logout'?>" class="btn btn-danger square-btn-adjust">Logout</a>
</div>