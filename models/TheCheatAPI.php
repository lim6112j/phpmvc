<?php


namespace app\models;


use app\core\Model;
use PDO;
use PDOException;

class TheCheatAPI extends Model
{
    public static function runFetch($sql) {
        try {
            $db = static::getDB();
            $statement = $db->prepare($sql);
            $statement->execute();
            return $statement->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function runFetchAll($sql): array
    {
        try {
            $db = static::getDB();
            $statement = $db->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insertWithId($sql)
    {
        try {
            $db = static::getDB();
            $statement = $db->prepare($sql);
            $statement->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $query = "SELECT * FROM api_user";
            $statement = $db->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public static function thecheat_open_api_key_check_mysql(array $info_array){
        try {
            $db = static::getDB();
            $query = "select server_ip_list, enc_key, contract_bit from api_user where uid='{$info_array['key_no']}' and api_key='{$info_array['key']}';";
            $statement = $db->query($query);
            $server_ip_list_check = $statement->fetchObject();
            $server_ip_list_check->server_ip_list = str_replace(" ", "", $server_ip_list_check->server_ip_list);
            $server_ip_list_temp = explode(",", $server_ip_list_check->server_ip_list); // | 구분자로 키워드를 분리한다.
            $server_ip_list_count = count($server_ip_list_temp);
            $ip_check_value = "N";
            if ($info_array['ipaddress'] && $server_ip_list_count) { // IP 유무 체크
                while ($server_ip_list_count--) {
                    // IP 체크
                    if ($info_array['ipaddress'] == trim($server_ip_list_temp[$server_ip_list_count])) {
                        $ip_check_value = "Y";
                        break;
                    }
                }
            }
            //if($server_ip_list_check['test_count']>100){ // 테스트는 100회 이상 할 수 없다.
            //    $ip_check_value = "N";
            //}

            $result_return = array();
            $result_return['ip_check_value'] = $ip_check_value;
            $result_return['enc_key'] = $server_ip_list_check->enc_key; // 키값
            $result_return['site_key'] = $server_ip_list_check->enc_key; // 키값
            $result_return['company_id_mbruid'] = $server_ip_list_check->company_id_mbruid ?? "not found";
            $result_return['contract_bit'] = $server_ip_list_check->contract_bit;

            return $result_return;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function fraudSearch($keyword_type, $keyword, $key_no)
    {
        try {
            $db = static::getDB();
            if($keyword_type=="account"){
                // 계좌 검색
                if($key_no == "41"){
                    // 6개월 테이블
                    // 핀크의 경우 6개월 데이터를 기준으로 조회한다.
                    $query_string = "SELECT count(*) as cnt FROM fraud_list_6month WHERE cheat_account='".hash("sha256", $keyword)."';";
                }else{
                    // 3개월 테이블
                    $query_string = "SELECT count(*) as cnt FROM fraud_list WHERE cheat_account='".hash("sha256", $keyword)."';";
                }
            }else{
                // 휴대폰 검색
                if($key_no == "41"){
                    // 6개월 테이블
                    // 핀크의 경우 6개월 데이터를 기준으로 조회한다.
                    $query_string = "SELECT count(*) as cnt FROM fraud_list_6month WHERE cheat_phone='".hash("sha256", $keyword)."';";
                }else{
                    // 3개월 테이블
                    $query_string = "SELECT count(*) as cnt FROM fraud_list WHERE cheat_phone='".hash("sha256", $keyword)."';";
                }
            }
            $statement = $db->query($query_string);
            $R = $statement->fetch(PDO::FETCH_ASSOC);
            return $R;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}