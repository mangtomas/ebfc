<h2>_activity_log</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>activity_log_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        description    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">text</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        action    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_log    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_chat</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>chat_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _from    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>users_id sender</td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _to    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>users_id recipient</td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        message    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">text</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_created    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_dtr</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _in    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">time</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _out    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">time</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _date    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">date</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        p_status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        isOut    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_employee</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>employee_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        employee_number    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        firstname    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        middlename    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        lastname    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        avatar    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        company_name    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        address    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        gender    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(25)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        cv_stat    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        contact_number    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        mobile_number    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_updated    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        date_registered    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_feeback</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>feedback_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        issue_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_issue -&gt; issue_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        feedback    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">text</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        remarks    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        date_created    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_history</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>history_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        module_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_module -&gt; module_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        description    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">text</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        action    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        history_date    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_id_card</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>id_card_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_created    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_issue</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>issue_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        project_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_project -&gt; project_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        date_assigned    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">date</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        due_date    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">date</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        result    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_module</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>module_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        reference_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_module_label -&gt; label_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        module    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        url    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        back_end    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _create    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _read    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _update    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _delete    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _export    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _print    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _sort    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_module_label</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>label_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        label    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _sort    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_permission</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>permission_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        module_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td>_module -&gt; module_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        role_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td>_role -&gt; role_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _create    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap">0</td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _update    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap">0</td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _delete    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap">0</td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _read    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap">0</td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        _export    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap">0</td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        _print    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_project</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>project_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        project    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        description    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">text</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_created    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">date</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_role</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>role_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        role    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_todolist</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>todolist_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        users_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_users -&gt; users_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        todo    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        due_date    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        </tbody></table>
</div>
    <div style="page-break-before: always;">
<h2>_users</h2>

<table class="print table table-striped tabled-condensed" width="100%">
<tbody><tr><th width="50">Field</th>
    <th width="80">Type</th>
    <th width="40">Null</th>
    <th width="70">Default</th>
        <th>Links to</th>
    <th>Comments</th>
    <th>MIME</th>
</tr>
    <tr class="odd">
    <td nowrap="nowrap">
        <u>users_id</u>    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        role_id    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">int(11)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td>_role -&gt; role_id</td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        password    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        email_address    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        firstname    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        middlename    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        lastname    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        avatar    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        company_name    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        address    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        gender    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(25)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        cv_stat    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>No</td>
    <td nowrap="nowrap"></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        contact_number    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        mobile_number    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        status    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">tinyint(1)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        date_updated    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="odd">
    <td nowrap="nowrap">
        date_registered    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">datetime</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td></td>
</tr>
        <tr class="even">
    <td nowrap="nowrap">
        varKey    </td>
    <td xml:lang="en" dir="ltr" nowrap="nowrap">varchar(255)</td>
    <td>Yes</td>
    <td nowrap="nowrap"><i>NULL</i></td>
            <td></td>
    <td></td>
    <td>