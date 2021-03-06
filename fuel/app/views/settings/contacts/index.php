<?php
$layout->title = 'Contacts';
$layout->leftnav = render('settings/leftnav');
$layout->pagenav = render('settings/contacts/pagenav');
$layout->breadcrumbs['Settings'] = 'settings';
$layout->breadcrumbs['Contacts'] = '';
?>

<?php if (empty($contacts)): ?>
	<div class="alert alert-error">
		<p>This seller has no contacts.</p>
	</div>
	<?php return ?>
<?php endif ?>

<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Primary</th>
		<th>Company Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Fax</th>
		<th>Address</th>
		<th>Date Created</th>
		<th>Date Updated</th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach ($contacts as $contact): ?>
			<tr>
				<td><?php echo $contact->id ?></td>
				<td><?php echo ($contact == $primary) ? '<i class="icon-ok"></i>' : '' ?></td>
				<td><?php echo $contact->company_name ?></td>
				<td><?php echo Html::mail_to($contact->email) ?></td>
				<td><?php echo $contact->phone() ?></td>
				<td><?php echo $contact->fax() ?></td>
				<td>
					<?php if (!empty($contact->address)): ?>
						<?php echo $contact->address . ' ' . $contact->address2 ?><br />
						<?php echo $contact->city . ', ' . $contact->state . ' ' . $contact->zip ?><br />
						<?php echo $contact->country() ?>
					<?php endif ?>
				</td>
				<td><?php echo View_Helper::date($contact->created_at) ?></td>
				<td><?php echo ($contact->updated_at != $contact->created_at) ? View_Helper::date($contact->updated_at) : '' ?></td>
				<td><?php echo Html::anchor($contact->link('settings', 'edit'), '<i class="icon icon-pencil"></i> Edit', array('class' => 'action-link')) ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
