<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TrxController extends Controller
{


    public function branches()
    {
        $branches = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->distinct()
            ->get();

        return response()->json($branches);
    }

    public function search(Request $request)
    {
        $trxDate = $request->sales_date;

        if ($request->branch != 'BBCU') {

            $sql = "
    SELECT FORMAT(TrxDate, 'hh:mm:ss tt') AS TrxDate, TrxNo,
           TotalAmount, Customer.Customer_name, CSH.CreateBy,
           (SELECT TOP 1 USERNAME FROM SER_USERPROFILE WHERE USERID = CSH.SalesmanID) AS Salesperson,
           TrxDate AS TrxSalesDate
    FROM SER_TRX_CASHSALES_HEAD CSH
    OUTER APPLY
    (
        SELECT TOP 1 Customer_name
        FROM
        (
            SELECT Customer_name FROM SER_CUSTOMER WHERE Customer_ID = TRY_CAST(CSH.CustID AS INT)
            UNION ALL
            SELECT CRM_DisplayName FROM SER_CRM_Customer WHERE Membership_ID = TRY_CAST(CSH.CustID AS VARCHAR(50))
        ) Cust
    ) Customer
    WHERE ISNULL(VOID, '') = ''
      AND TrxDate >= IIF(:trx_date1 = '', CONVERT(DATE, GETDATE()), :trx_date2)
      AND TrxDate < IIF(:trx_date3 = '', DATEADD(DAY, 1, CONVERT(DATE, GETDATE())), DATEADD(DAY, 1, :trx_date4))
    ORDER BY CSH.TrxDate DESC
";

            $data = DB::select($sql, [
                'trx_date1' => $trxDate,
                'trx_date2' => $trxDate,
                'trx_date3' => $trxDate,
                'trx_date4' => $trxDate,
            ]);
        } else {

            $sql = "
    SELECT FORMAT(TrxDate, 'hh:mm:ss tt') AS TrxDate, TrxNo,
           TotalAmount, Customer.Customer_name, CSH.CreateBy,
           (SELECT TOP 1 USERNAME FROM SER_USERPROFILE WHERE USERID = CSH.SalesmanID) AS Salesperson,
           TrxDate AS TrxSalesDate
    FROM SER_TRX_CASHSALES_HEAD CSH
    OUTER APPLY
    (
        SELECT TOP 1 Customer_name
        FROM
        (
            SELECT Customer_name FROM SER_CUSTOMER WHERE Customer_ID = TRY_CAST(CSH.CustID AS INT)
            UNION ALL
            SELECT CRM_DisplayName FROM SER_CRM_Customer WHERE Membership_ID = TRY_CAST(CSH.CustID AS VARCHAR(50))
        ) Cust
    ) Customer
    WHERE ISNULL(VOID, '') = ''
      AND TrxDate >= IIF(:trx_date1 = '', CONVERT(DATE, GETDATE()), :trx_date2)
      AND TrxDate < IIF(:trx_date3 = '', DATEADD(DAY, 1, CONVERT(DATE, GETDATE())), DATEADD(DAY, 1, :trx_date4))  AND Remark1 <> 'NO SALES DAY'
    ORDER BY CSH.TrxDate DESC
";

            $data = DB::connection('sqlsrv_second')->select($sql, [
                'trx_date1' => $trxDate,
                'trx_date2' => $trxDate,
                'trx_date3' => $trxDate,
                'trx_date4' => $trxDate,
            ]);
        }

        return response()->json($data);
    }
}
