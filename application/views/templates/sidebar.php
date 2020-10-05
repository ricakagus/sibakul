<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url(); ?>" class="brand-link">
    <img src="<?= base_url('assets/'); ?>img/logo4-sibakul.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <!-- <i class="fas fa-fw fa-journal-whills"></i> -->
    <span class="brand-text font-weight-bold">SIBAKUL<sup>1</sup></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('user'); ?>" class="d-block"><?= $user['nama']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Query Menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `tb_menu`.`id`,`menu`,`ikon`
                    FROM `tb_menu` JOIN `tb_access_menu`
                    ON `tb_menu`.`id`=`tb_access_menu`.`menu_id`
                    WHERE `tb_access_menu`.`role_id`=$role_id
                    ORDER BY `tb_access_menu`.`menu_id` ASC
                   ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon  <?= $m['ikon']; ?>"></i>
              <p>
                <?= $m['menu']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- SIAPKAN Sub Menu sesuai Menu masing-masing -->
              <?php
              $menuID = $m['id'];
              $querySubMenu = "SELECT * FROM `tb_sub_menu` JOIN `tb_menu`
                               ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id`
                               WHERE `tb_sub_menu`.`menu_id` = $menuID
                              ";

              $subMenu = $this->db->query($querySubMenu)->result_array();


              ?>

              <?php foreach ($subMenu as $sm) : ?>
                <li class="nav-item">
                  <?php if ($sm['title'] == $judul) : ?>
                    <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                    <?php else : ?>
                      <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                      <?php endif; ?>
                      <i class="<?= $sm['icon']; ?> nav-icon"></i>
                      <p><?= $sm['title']; ?></p>
                      </a>
                </li>
              <?php endforeach; ?>

            </ul>
          </li>
        <?php endforeach; ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>