<?php

/**
 * Template to display a view as a table.
 *
 * Available variables:
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 *
 * @file
 *
 * @ingroup templates
 */
?>
<table id="teamtree" class="<?php print($classes); ?>">
<tr>
  <th>Team Name</th>
  <th>Status</th>
  <th>Options</th>
</tr>
<?php
// Call Teams api to get list of all teams
$team_list = teams_order_teams($rows);

// Row count used for striped table
// Note: you can't use array for the row count because the key values are ordered by the hierarchy
$row_count = 0;

// Display teams as rows
foreach($team_list as $row){ ?>
<tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) . '"'; } ?>>
  <td width="60%"><a href="/admin/config/teams/team/users/<?php print($row['team_id']); ?>"><?php print($row['name']); ?></a></td>
  <td><?php print($row['status']); ?></td>
  <td><a href="/admin/config/teams/team/edit/<?php print($row['team_id']); ?>">Edit</a> | <a href="/admin/config/teams/team/remove/<?php print($row['team_id']); ?>">Remove</a></td>
</tr>
<?php
// Update row count
$row_count++;
} ?>
</table>
