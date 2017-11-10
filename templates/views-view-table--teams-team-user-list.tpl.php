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
<table id="teamusers" class="<?php print($classes); ?>">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Roles</th>
    <th>Modified</th>
    <th>Created</th>
    <th>Options</th>
  </tr>
  <?php foreach ($rows as $row_count => $row) { ?>
    <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) . '"'; } ?>>
      <td><?php print($row['name']); ?></td>
      <td><?php print_r($row['mail']); ?></td>
      <td><?php print($row['rid_1']); ?></td>
      <td><?php print($row['modified']); ?></td>
      <td><?php print($row['created']); ?></td>
      <td><a href="/user/<?php print($row['uid']); ?>/edit">Edit</a> | <a href="/admin/config/team-ownership/team/users/remove/<?php print($row['team_id']); ?>/<?php print($row['uid']); ?>">Remove</a></td>
    </tr>
  <?php } ?>
</table>
