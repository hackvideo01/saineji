<?
ini_set("display_errors",1);
require_once('./HtmlExcel-master/HtmlExcel.php');
// require ('./Classes/PHPExcel.php');
include("./include/base/conf.php");

$db = new MySQLDatabase();

	/* テンプレート表示クラス */
	$vw = new utl_view();

	/* 汎用関数クラス */
	$sys = new utl_system();

$a =1;
	if ($a==1) {
		$viewid = 0;
		if(isset($_REQUEST["viewid"])){
		$viewid = $_REQUEST["viewid"];
		// $data = getdatabyid($viewid);
			}	
		// Instantiate a new PHPExcel object
		// $objPHPExcel = new PHPExcel(); 
		// Set the active Excel worksheet to sheet 0
		// $objPHPExcel->setActiveSheetIndex(0); 

		// $sheet = $objPHPExcel->getActiveSheet()->setTitle('OK');
		// Initialise the Excel row number
		// $rowCount = 1; 

		
		// echo $viewid;
		// global $viewid;
		// session_start();
		// if (isset($_SESSION['test'])) {
		// $id = $_SESSION['test'];
		// // echo $id;
		// } else {
		// echo "No session";
		// }
		// // unset($_SESSION['test']);
		
		$params = [];
		/*- 一覧情報取得 -*/
		$sql = "SELECT * FROM `data` WHERE ID=".$viewid ;
		$row = $db->get_one($sql, $params);
		// print_r($row);
		$sns = $row['Delivery'];
		$img = $row['isImage'];
		if($img==1){
			$yn = "有り";
		}
		else{
			$yn = "無い";
		}
		// echo $yn;
	



		// $conn = mysqli_connect('localhost', 'root', '', 'soshiki');
		// // echo $id;
		// /*- 一覧情報取得 -*/
		// $sql="SELECT `ID`, `Mater_Id`, `GPID`, `GPNAME`, `BroadID`, `BroadName`, `ReponsibleName`, `RsTelephone`, `ReponsibleEmail`, `AuthorName`, `AuTelephone`, `AuthorEmail`, `Charge`, `ChargeDate`, `President`, `PresidentDate`, `isImage`, `DeliveryDate`, `Delivery`, `ImageFile`, `Title`, `Text`, `Status`, `InsertDate`, `UpdatedDate`, `isExcel` FROM `data` WHERE ID=".$id;
		// print_r($sql);
		// $excel = mysqli_query($conn,$sql);
		// while ($row=mysqli_fetch_array($excel)) {
		// $battle = $row['BroadName'];
		// echo $battle;
$css='
	h2{
		text-align:center;
		color:#3B5998;
	}
	table {font-family:inherit ,sans-serif; border-top: 1px solid white; border-left: 1px solid #bbb; border-right: 1px solid #999;border-collapse: collapse;width: 98%; margin-left:5px;color: white;}
	table th, table td { font-weight: normal; background-color: #F3F3F3; border-left: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white; padding: 4px; line-height: 1.6em; font-size: 1.1em;}
	table th {background-color: #ff9800;text-align: left; font-size:150%;}
	.r_vw_y {display:none !important;}

	table.t_form {width:85%; margin-left: auto; margin-right: auto;10px;margin-bottom:10px}

	th {width:230px;}
	table td {width:240px;color:black; font-size:120%; text-align:left;}

	table{
		border-top:#999;
	}
	textarea { border: none; }

	table.t_list tr .not_auth{background-color:#eee;}
	.w50p {width: 1000px !important;}
	';

$table='
	<h2>'.$row["Delivery"].'</h2>
	<div class="inputform_div">
					<table class="t_form" align="center">
						<tr>
							<th>グループ名</th>
							<td colspan="3">
							'.$row["GPNAME"].'
							</td>
						</tr>
						<tr>
							<th>会議 . 委員会名</th>
							<td colspan="3">
							'.$row["BroadName"].'	
							</td>
						</tr>
						<tr>
							<th>責任者氏名（役職）</th>
							<td>'.$row["ReponsibleName"].'</td>
							<th>責任者携帯番号</th>
							<td>\''.$row["RsTelephone"].'</td>
						</tr>
						<tr>
							<th>責任者 E-MAIL</th>
							<td colspan="3">'.$row["ReponsibleEmail"].'</td>
						</tr>
						<tr>
							<th>作成者氏名（役職）</th>
							<td>'.$row["AuthorName"].'</td>	
							<th>作成者携帯番号</th>
							<td>\''.$row["AuTelephone"].'</td>						
						</tr>
						<tr>
							<th>作成者 E-MAIL</th>
							<td colspan="3">'.$row["AuthorEmail"].'</td>							
						</tr>
						<tr>
							<th>担当常識理事氏名</th>
							<td>'.$row["Charge"].'</td>	
							<th>担当常任理事決裁</th>
							<td>'.$row["ChargeDate"].'</td>						
											
						</tr>
						<tr>
							<th>担当副会頭氏名</th>
							<td>'.$row["President"].'</td>	
							<th>担当副会頭決裁</th>
							<td>'.$row["PresidentDate"].'</td>						
						</tr>
						<tr>
							<th>画像データの有無</th>
							<td class="choice">'.$yn.'</td>	
							<th>配信希望</th>
							<td>'.$row["DeliveryDate"].'</td>						
						</tr>
						<tr>
							<th>配信媒体</th>
							<td colspan="3">
							'.$row["Delivery"].'
							</td>							
						</tr>
						<tr>
							<th>広報戦略シート</th>
									<td colspan="3"></td>							
								</tr> 
						<tr>

							<th>画像ファイル</th>  
							<td colspan="3"></td>							
						</tr> 
						<tr>
							<th>タイトル</th>
							<td colspan="3">'.$row["Title"].'</td>							
						</tr>
						<tr>
							<th style="height:90px;">本文</th>
							<td colspan="3">
										<textarea name="Text" rows="3" cols="98" value="">'.$row["Text"].'</textarea>
							</td>						
						</tr>
					</table>
				</div>
				';
// echo $table;
$xls = new HtmlExcel();
$xls->setCss($css);
$xls->addSheet($sns, $table);
$xls->headers();
echo $xls->buildFile();
}
?>