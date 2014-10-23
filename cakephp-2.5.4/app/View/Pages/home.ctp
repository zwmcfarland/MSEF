<style>
	div.left_pane {
		width: 35%;
		display: inline-block;
		float: left;
	}
	div.right_pane {
		width: 35%;
		display: inline-block;
		float: right;
	}
	div.info_pane {
		margin-top: 50px;
	}
	fieldset {
		margin-bottom: 0;
	}
	fieldset input {
		align: left;
		margin : 5px;
	}
</style>
<div>
	<h1>Welcome To Omaha Metro Area Science Fair Website!</h1>
	<div class="left_pane info_pane">
		<h3>About</h3>
		<p>
			The annual Metropolitan Science and Engineering Fair (MSEF)/Nebraska Junior Academy of Sciences(NJAS) is open to all 
			greater Omaha-area students in grades 7-12. It is held at the Henry Doorly Zoo and Aquarium Conference Center. An awards ceremony 
			will follow. The MSEF/NJAS gives students an opportunity to present and display their research projects and have their projects 
			judged by area college instructors and practicing professionals in the projects field. 
		</p>
		<p>
			MSEF is affiliated with the Nebraska Junior Academy of Sciences (NJAS). Further information about this year's Fair is found in this year's Booklet
		</p>
	</div>
	<div class="right_pane info_pane">
		<h3>Sign In</h3>
		<form>
			<fieldset>
				<input type="text"     placeholder="Email">  
				<input type="password" placeholder="Password">
			</fieldset>
			<div>
				<div style="display:inline-block;vertical-align:top;float:left;">
					<a style="font-weight:normal;" href="./users/add">Sign Up</a>
				</div>
				<div align="right" style="display:inline-block;float:right;">
					<input type="button"   value="Sign In"/>
				</div>
			</div>
		</form>
	</div>
</div>
