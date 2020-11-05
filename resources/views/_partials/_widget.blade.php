<aside class="main-sidebar font-weight-bold mt-2">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="active">
				<a href="{{url('/')}}"><i class="fa fa-home"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" class="link"><i class="fa fa-users"></i>
					<span>People</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
			
			<ul class="treeview-menu">
				<li>
					<a href="/people"><i class="fa fa-list"> </i>
						<span>View all </span>
					</a>
			</li>
			<li>
				<a href="{{url('/new/user')}}"><i class="fa fa-user-plus"></i>
				<span>New <i class="fa fa-plus"></i></span>
				</a>
			</li>
			</ul>
			
			<li>
				<a href="#"><i class="fa fa-users"> </i>
					<span>User & Roles</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
			<ul class="treeview-menu">
				<li>
					<a href="{{url('users')}}"><i class="fa fa-user-o"></i>
						<span>Users</span>
					</a>  
				</li>
				<li>
					<a href="{{url('admin/roles')}}"><i class="fa fa-list"></i>
						<span>Roles & Permissions</span>
					</a>
				</li>
				
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-user-o"></i>
				<span>Groups</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
		<ul class="treeview-menu">
			<li>
				<a href="{{url('view/groups')}}"><i class="fa fa-list-alt"></i>
				<span>View Groups</span>
				</a>
			</li>
			<li>
				<a href="{{url('new/group')}}"><i class="fa fa-plus"></i>
					<span>New Group</span>
				</a>
			</li>
		</ul>
		</li>
		<li>
		<a href="#"><i class="fa fa-file"></i>
		<span>Events</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="/events/"><i class="fa fa-files-o"></i>
		<span>View Events</span>
		</a>
		</li>
		</ul>
		</li>
		<li>
		<a href="#"><i class="fa fa-handshake-o"></i>
		<span>Follow up</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="{{url('/followup')}}"><i class="fa fa-files-o"></i>
		<span>View Follow up</span>
		</a>
		</li>
		</ul>
		</li>
		<li>
		<a href="#"><i class="fa fa-calendar-o"></i>
		<span>Calendar</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="{{url('/calendar')}}"><i class="fa fa-files-o"></i>
		<span>View Calendar</span>
		</a>
		</li>
		</ul>
		</li>
		<li>
		<a href="#"><i class="fa fa-file-o"></i>
		<span>Forms</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="{{url('/form')}}"><i class="fa fa-files-o"></i>
		<span>View Forms</span>
		</a>
		</li>
		</ul>
		</li>
		<li>
			<li>
			<a href="#"><i class="fa fa-bell-o"></i>
				<span>Notification</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
		<ul class="treeview-menu">
			<li>
				<a href="{{url('view/notification')}}"><i class="fa fa-list-alt"></i>
				<span>View Notifications</span>
				</a>
			</li>
		</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-bar-chart-o"></i>
				<span>Reports</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
		<ul class="treeview-menu">
			<li>
				<a href="{{url('view/reports')}}"><i class="fa fa-list-alt"></i>
				<span>View Reports</span>
				</a>
			</li>
		</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-mobile-phone"></i>
				<span>Member Access</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
		<ul class="treeview-menu">
			<li>
				<a href="{{url('view/groups')}}"><i class="fa fa-list-alt"></i>
				<span>View Groups</span>
				</a>
			</li>
			<li>
				<a href="{{url('new/group')}}"><i class="fa fa-plus"></i>
					<span>New Group</span>
				</a>
			</li>
		</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-money"></i>
				<span>Contribution</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
		<ul class="treeview-menu">
			<li>
				<a href="{{url('view/contribution')}}"><i class="fa fa-list-alt"></i>
				<span>View Contributions</span>
				</a>
			</li>
			<li>
				<a href="{{url('new/contribution')}}"><i class="fa fa-plus"></i>
					<span>New Contribution</span>
				</a>
			</li>
			<li>
				<a href="{{url('Batches')}}"><i class="fa fa-plus"></i>
					<span>Batches</span>
				</a>
			</li>
			<li>
				<a href="{{url('funds')}}"><i class="fa fa-money"></i>
					<span>Funds</span>
				</a>
			</li>
			<li>
				<a href="{{url('payment')}}"><i class="fa fa-money"></i>
					<span>Payment Methods</span>
				</a>
			</li>
		</ul>
		</li>
		<li>
		<a href="#"><i class="fa fa-gear"></i>
		<span>Settings</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="#"><i class="fa fa-user"></i>
		<span>Change Password</span>
		</a>
		</li>
		<li><a href="#"><i class="fa fa-comment"></i> <span>Account Settings</span>
		</a>
		</li>
		<li><a href="#"><i class="fa fa-comment"></i> <span>Proiile Fields</span>
		</a>
		</li>
		<li><a href="#"><i class="fa fa-comment"></i> <span>Integration</span>
		</a>
		</li>
		<li><a href="#"><i class="fa fa-comment"></i> <span>Notification Settings</span>
		</a>
		</li>
		
		<li>
		<a href="#"><i class="fa fa-wrench"></i>
		<span>Tools</span>
		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		<li><a href="#"><i class="fa fa-medkit"></i>
		<span>Site Health</span>
		</a>
		</li>
		</ul>

		</ul>
		<ul class="treeview-menu">
		</li>
		</ul>
	</section>
</aside>