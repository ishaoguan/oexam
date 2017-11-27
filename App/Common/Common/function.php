<?php
function readExcel($filePath)
{
    header("Content-type:text/html;charset=utf-8");
    vendor('PHPExcel.PHPExcel');
    $PHPReader = new \PHPExcel_Reader_Excel2007();
    if (!$PHPReader->canRead($filePath)) {
        $PHPReader = new \PHPExcel_Reader_Excel5();
        if (!$PHPReader->canRead($filePath)) {
            $this->error('不能读到Excel');
        }
    }

    $PHPExcel = $PHPReader->load($filePath);
    $PHPExcel->discardMacros();
    $data = array();  //��������
    // var_dump($PHPExcel->getAllSheets());
    foreach ($PHPExcel->getAllSheets() as $index => $currentSheet) {

        $sheetName = $currentSheet->getTitle();
        //$allColumn = $currentSheet->getHighestColumn(); //ȡ�������к�
        //$allRow = $currentSheet->getHighestRow(); //ȡ��һ���ж�����

        $data[$sheetName] = $currentSheet->toArray();

        /**Excel 从1开始*/
        /*
        for($currentRow = 1;$currentRow <= $allRow;$currentRow++){
            //�ӵ�A�п�ʼ
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                $addr = $currentColumn.$currentRow;
                $cell = $currentSheet->getCell($addr)->getValue();
                if($cell instanceof PHPExcel_RichText)     //���ı�ת���ַ���
                    $cell = $cell->__toString();
                $data[$sheetName][$currentRow-1][] = $cell;
                //如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出
                //echo iconv('utf-8','gb2312', $val)."\t"; */
    }
    return $data;
}
