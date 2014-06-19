<?php   $users_last5 = get_visits('last5');
//$requests_num = get_visits('requests_num');
$requests_num = false;
?>
  <div id="visits_info_table">
  <h2><?php _e("Basic statistics"); ?>
  <span class="mw-ui-btn mw-ui-btn-small tip default-invert request-stats-btn" data-tip="<?php _e("Upgrade your real-time statistics"); ?>" data-tipposition="top-center"><?php _e("Upgrade"); ?></span>
    </h2>
  <?php

    ?>
  <?php if(!empty($users_last5)): ?>
  <table border="0" cellspacing="0" cellpadding="0" class="mw-ui-table mw-ui-table-basic mw-ui-table-fixed">
  <colgroup>
    <col width="15%">
    <col>
    <?php if(function_exists('ip2country')): ?>
        <th scope="col"><?php _e("Country"); ?></th>
    <?php endif; ?>
    <col width="50%">
    <col width="10%">
  </colgroup>
    <thead>
      <tr>
        <th scope="col"><?php _e("Date"); ?></th>
        <?php if(function_exists('ip2country')): ?>
        <th scope="col"><?php _e("Country"); ?></th>
        <?php endif; ?>
        <th scope="col"><?php _e("IP"); ?></th>
        <th scope="col"><?php _e("Last page"); ?></th>
        <th scope="col"><?php _e("Views"); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php $i=0; foreach($users_last5 as $item) : ?>
      <tr>
        <td class="stat-time"><?php print mw()->format->date($item['visit_date']); ?>, <?php print date('H:m', strtotime($item['visit_time'])); ?></td>
        <?php if(function_exists('ip2country')): ?>
        <td class="stat-ip"><span class="<?php if(strlen(ip2country($item['user_ip'])) > 15){ ?>tip<?php } ?>" data-tip="<?php print ip2country($item['user_ip']); ?>" data-tipposition="top-center"><?php print ip2country($item['user_ip']); ?></span></td>
        <?php endif; ?>
        <td class="stat-ip"><span class="<?php if(strlen(($item['user_ip'])) > 15){ ?>tip<?php } ?>" data-tip="<?php print ($item['user_ip']); ?>" data-tipposition="top-center"><?php print $item['user_ip'] ?></span></td>
        <td class="stat-page"><a href="<?php print $item['last_page'] ?>" class="<?php if(strlen($item['last_page']) > 40){ ?>tip<?php } ?>" data-tip="<?php print $item['last_page'] ?>" data-tipposition="top-center"><?php print $item['last_page']; ?></a></td>
        <td class="stat-views"><?php print $item['view_count'] ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
  <?php endif; ?>



</div>