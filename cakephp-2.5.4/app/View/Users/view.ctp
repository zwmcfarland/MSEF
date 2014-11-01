<!-- File: /app/View/Posts/view.ctp -->

<div class="row">
    <h1>View User</h1>
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>First Name:</td>
                <td><?php echo $user['User']['FirstName']; ?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><?php echo $user['User']['LastName']; ?></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><?php echo $user['User']['PhoneNumber']; ?></td>
            </tr>
            <tr>
                <td>School:</td>
                <td><?php echo $this->Html->link($user['School']['Name'],'/schools/view/' . $user['School']['Id']); ?></td>
            </tr>
            <tr>
                <td>Grade:</td>
                <td><?php echo $user['User']['Grade']; ?></td>
            </tr>
            <tr>
                <td>Parent First Name:</td>
                <td><?php echo $user['User']['ParentFirstName']; ?></td>
            </tr>
            <tr>
                <td>Parent Last Name:</td>
                <td><?php echo $user['User']['ParentLastName']; ?></td>
            </tr>
            <tr>
                <td>Parent Phone Number:</td>
                <td><?php echo $user['User']['ParentPhoneNumber']; ?></td>
            </tr>
            <tr>
                <td>Parent Email:</td>
                <td><?php echo $user['User']['ParentEmail']; ?></td>
            </tr>
            <tr>
                <td>Secuirty Type Id:</td>
             <td><?php echo $user['SecurityType']['Name']; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $user['User']['Email']; ?></td>
            </tr>
            <tr>
                <td>Alt Phone Number:</td>
                <td><?php echo $user['User']['AltPhoneNumber']; ?></td>
            </tr>
            <tr>
                <td>Position:</td>
                <td><?php echo $user['User']['Position']; ?></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><?php echo $user['User']['City']; ?></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><?php echo $user['User']['State']; ?></td>
            </tr>
            <tr>
                <td>Address 1:</td>
                <td><?php echo $user['User']['Address1']; ?></td>
            </tr>
            <tr>
                <td>Address 2:</td>
                <td><?php echo $user['User']['Address2']; ?></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><?php echo $user['User']['Zip']; ?></td>
            </tr>
        </tbody>
    </table>
</div>