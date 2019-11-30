<div class="reservationDatetimes index large-9 medium-8 columns content">
    <table class="carendar" cellpadding="0" cellspacing="0">
      <tbody>
          <?= $this->Html->tableCells($daysWeek) ?>
          <tr>
            <th>
              <table class="carendar" cellpadding="0" cellspacing="0">
                <?= $this->Html->tableCells($time) ?>
              </table>
            </th>
            
            <?php foreach($week as $w): ?>
            <th>
              <table class="carendar" cellpadding="0" cellspacing="0">
                <?php foreach($link_time as $t): ?>
                <tr>
                  <?php if(in_array($w.$t, $reserved)): ?>
                    <td>✖︎</td>
                  <?php else: ?>
                    <td><a href="Testers/reservation/<?= h($w . $t) ?>">◯</a></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
              </table>
            </th>
            <?php endforeach; ?>
                
            <th>
              <table class="carendar" cellpadding="0" cellspacing="0">
                <?= $this->Html->tableCells($time) ?>
              </table>
            </th>
          </tr>
      </tbody>
    </table>

