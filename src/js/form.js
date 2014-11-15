/*
	<SPDX-License-Identifier: Apache-2.0>

	Copyright 2014 David Le, Nick Boeckman, & Zac McFarland
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at
	
	    http://www.apache.org/licenses/LICENSE-2.0
	
	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License. */
function subComp() 
{
	var result = $('#iframSub').contents();
	if(result[0].documentElement.childNodes[1].innerHTML != '')
	{
		var data = JSON.parse(result[0].documentElement.childNodes[1].innerHTML);
		var error = '<td><table><tr><td>Errors:</td></tr>';
		for (var i = 0; i < data.length; i++) 
		{
		    error += '<tr><td><p class="text-error">' + data[i] + '</p></td></tr>';
		}	
		if(data.length == 0)
		{
			error = '<tr><td><p class="text-success">Succsessfully added!</p><td></tr>';
			$('#addForm').find("input[type=text], textarea").val("");
		}
		else
		{
			error += '</table></td>';
		}
		$('#formSubmission').html(error);
	}
	else
	{
		$('#formSubmission').hide();
		$('#formSubmission').html('<p><img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>Submiting form, please wait...</p>');
	}
}
function formSubmit()
{
	$('#formSubmission').show();
}
