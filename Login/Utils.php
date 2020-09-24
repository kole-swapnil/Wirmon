<?php

class Utils
{
    public function getTotalJobseekerCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from jobseeker");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function getTotalinternsCnt($conn)
    {
        try{
            $stmt = $conn->prepare("select count(*) from employer");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                return $stmt->fetchColumn();
            }
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
  }
