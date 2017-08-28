<!-- Main START -->
<main>
  <div class="container">
    <h1 class="thin">Dashboard</h1>
    <div id="dashboard">
      <div class="section">
        <p>NOTE: menu yang lain mengikuti ini aja.</p>
        <p><?php echo $this->session->userdata('id');?></p>
        <p><?php echo $this->session->userdata('username');?></p>
        <p><?php echo $this->session->userdata('pass');?></p>
        <p><?php echo $this->session->userdata('nama');?></p>
        <p><?php echo $this->session->userdata('status');?></p>
      </div>
    </div>
  </div>
  <!-- container END -->
</main>
