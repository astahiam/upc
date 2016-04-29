CREATE OR REPLACE RULE update_parcel_status AS
    ON UPDATE TO "Parcel"
   WHERE new."Status" <> old."Status" DO  UPDATE "WP02_Sid_Land_Acquired_Report" SET "Status" = new."Status", "Area" = new."Area_of_Land_Signed", "Component" = new."PCL", "LastUpdate" = current_date
  WHERE "WP02_Sid_Land_Acquired_Report"."Parcel No" = new."Parcel_Number";