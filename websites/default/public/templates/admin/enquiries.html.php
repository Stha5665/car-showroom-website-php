<section class="right">
    <?php
    // This layout is reused for new enquiry page as well as previous enquiry page
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // If user is logged in so this page
        
        ?>
        <h2>Enquiries</h2>
        <?php
        // initially while visiting enquiries section there will be See previous Enquiry
        // after going to previous enquiry there will be see new enquiry 
        if($previousEnquiryPage){
            echo '<a class="new" href="?page=enquiries">See New Enquiry</a>';
        }else{
            echo '<a class="new" href="?page=previousEnquiries">See previous Enquiry</a>';
            
        }
        ?>
         <table>
            <thead>
                <tr>
                    <th >Enquiry By</th>
                    <th>Email</th>
                    <th style="width: 10%">Telephone-no</th>
                    <th>Description</th>
                    <?php
                    if($previousEnquiryPage){
                     echo '<th>Completed By</th>';
                    }?>
                    <th style="width: 5%">&nbsp;</th>

                </tr>
                <?php
                foreach ($enquiriesData as $enquiry) {
                ?>
                <tr>
                    <td><?= $enquiry['person_name'] ?> </td>
                    <td><?= $enquiry['email'] ?> </td>
                    <td><?= $enquiry['telephone_no'] ?> </td>
                    <td><?= $enquiry['enquiry'] ?> </td>
                    <?php
                    if($enquiry['completed'] == 'N'){
                    ?>
                        <td>
                        <form method="post">
                            <input type="hidden" name="enquiryId" value="<?= $enquiry['id']?>"/>
                            <input type="submit" name="submit" value="Mark Complete" />
					    </form>
                    </td>
                    <?php
                    }else{
                        echo'<td>'. $enquiry['completed_by'] .'</td>';
                    }
                    ?>
                    
                </tr>
                <?php
                }
                ?>
            </thead>
        </table>
    <?php
    }
    else {
        header("Location:/?page=admin");
    }
    ?>
    </section>

