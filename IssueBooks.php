
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->IssuesDate);?></td>
                                            <td class="center"><?php if($result->ReturnDate=="")
                                            {?>
                                            <span style="color:red">
                                             <?php   echo htmlentities("Not Return Yet"); ?>
                                                </span>
                                            <?php } else {
                                            echo htmlentities($result->ReturnDate);
                                        }
                                            ?></td>
                                              <td class="center"><?php echo htmlentities($result->fine);?></td>

                                        </tr>
 <?php $cnt=$cnt+1;?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
  
                </div>
            </div>



    </div>
    </div>
    </div>
 
  <?php include('includes/footer.php');?>
 
 
    <script src="assets/js/jquery-1.10.2.js"></script>
 
    <script src="assets/js/bootstrap.js"></script>
 
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
 
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php  ?>
