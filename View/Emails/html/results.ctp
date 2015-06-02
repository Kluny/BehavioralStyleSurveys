<table border="0" width="50%" bgcolor="#C9B47D" cellspacing="1" cellpadding="3" align="center">
	<tr>
		<td colspan="2">
			<h3><font color="#000000"><strong>Information you provided:</strong></font></h3>
		</td>
		</tr>
	<tr>
		<td width="50%" bgcolor="FFFFFF">Name:</td>
		<td width="50%" bgcolor="FFFFFF"><?php echo $submission['BehavioralStyleSurveySubmission']['name']; ?></td>
	</tr>
	<tr>
		<td width="50%" bgcolor="FFFFFF">Phone Number:</td>
		<td width="50%" bgcolor="FFFFFF"><?php echo $submission['BehavioralStyleSurveySubmission']['phone_number']; ?></td>
	</tr>
	<tr>
		<td width="50%" bgcolor="FFFFFF">Fax Number:</td>
		<td width="50%" bgcolor="FFFFFF"><?php echo $submission['BehavioralStyleSurveySubmission']['fax_number']; ?></td>
	</tr>
	<tr>
		<td width="50%" bgcolor="FFFFFF">Team or Agent Name:</td>
		<td width="50%" bgcolor="FFFFFF"><?php echo $submission['BehavioralStyleSurveySubmission']['team_or_agent_name']; ?></td>
	</tr>
	<tr>
		<td width="50%" bgcolor="FFFFFF">Agent Email Address:</td>
		<td width="50%" bgcolor="FFFFFF"><?php echo $submission['BehavioralStyleSurveySubmission']['agent_email_address']; ?></td>
	</tr>
	<tr>
		<td colspan="2" valign="middle">
			<p>It is to be understood that all people posses all four of the personality types.  However, one personality type will be dominant in every person.  The four types being "D" Director, "I" Interactor, "S" Support, "C" Compliant.</p>
			<p>Based on the answers to your question to the Behavioral Style Survey, your personality profile at this moment in time is the "<?php echo $submission['BehavioralStyleSurveyBehavioralStyle']['symbol']; ?>" personality, otherwise known as the <?php echo $submission['BehavioralStyleSurveyBehavioralStyle']['name']; ?>.</p>
			<p>Thank you for your taking our Behavioral Style Profile.  Below you will find your personalized graph, showing exactly where you fall in the DISC classification. The attached personalized report will give you in-depth information regarding your personality profile.</p>
			<p>It is to be understood that all people posses all four of the personality types. However, one personality type will be dominant in every person. The four types being "D" Director, "I" Interactor, "S" Support, "C" Compliant.</p>
			<p>As you read your report, think about how valuable this information would be to know about your co-workers, friends and/or family members.</p>
			<p>Feel free to contact us if you have any questions.</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" valign="middle">
			<strong>Graph for <?php echo $submission['BehavioralStyleSurveySubmission']['name']; ?></strong>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<p>
			Thank you for your taking our Behavioral Style Profile.  Below you
			<br />
			will find your personalized graph, showing exactly where you fall in
			<br />
			the DISC classification.   The attached personalized report will give
			<br />
			you in-depth information regarding your personality profile.
			</p>
			<p>
			It is to be understood that all people posses all four of the
			<br />
			personality types. However, one personality type will be dominant
			<br />
			in every person. The four types being "D" Director, "I" Interactor,
			<br />
			"S" Support, "C" Compliant.
			</p>
			<p>
			As you read your report, think about how valuable this information
			<br />
			would be to know about your co-workers, friends and/or family
			<br />
			members.
			</p>
			<p>Feel free to contact us if you have any questions.</p>
		</td>
	</tr>
	<tr>
	
            <td colspan="2" align="center" valign="middle">
              <img src="<?php echo $submission['BehavioralStyleSurveySubmission']['chart_url']; ?>" 
			  alt="Behavioral Style" border="0" hspace="4" vspace="4" />
   		</td>
    </tr>
	<tr>
	<td>
	A pdf with further information is attached. If you are unable to download or view it, you may view it online at 
	<?php echo '<a href="' . $submission['BehavioralStyleSurveySubmission']['attachment_url'] . '">this url.</a>'; ?>
 
 
	</td>
	</tr>
	<tr>
		<td bgcolor="FFFFFF" colspan="2"><font size="1">
			This message is intended only for the use of the individual or entity to which it is addressed, and may contain information that is privileged, confidential and exempt from disclosure under applicable law.  Any other distribution, copying or disclosure is strictly prohibited.  If you have received this message in error, please notify us immediately and return the original transmission to us without making a copy.
		</font></td>
	</tr>
</table>

