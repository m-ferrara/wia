var AttributeValidationRules = [
  {
    "attribute" : "cit_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "int",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "author",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "source",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "source_secondary",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "pub_yr",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "int",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "pub_date",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "title",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : true,
    "table_name" : "citations"
  },
  {
    "attribute" : "isbn_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : true,
    "table_name" : "citations"
  },
  {
    "attribute" : "cit_desc",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "internet_address",
    "dataType" : "string",
    "regex" : null,
    "validation" : "url",
    "sanitization" : "url",
    "isUnique" : false
  },
  {
    "attribute" : "pages",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "cmt_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "int",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "cmt_body",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "cmt_date",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "u_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "pts_total",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "list_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "list_name",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "amnt_votes",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "avg_rating",
    "dataType" : "double",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "float",
    "isUnique" : false
  },
  {
    "attribute" : "added_by",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "cit_views_ct",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "cit_cmts_ct",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "sender_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "recipient_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "timestamp",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "tag_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "tag",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "cat_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "cat",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "cat_id",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "email",
    "dataType" : "string",
    "regex" : null,
    "validation" : "email",
    "sanitization" : "email",
    "isUnique" : true,
    "table_name" : "user_profile"
  },
  {
    "attribute" : "password",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
    "attribute" : "name_first",
    "dataType" : "string",
    "regex" : null,
    "validation" : "alfanum",
    "sanitization" : "string",
    "isUnique" : false
  },
  {
	    "attribute" : "name_last",
	    "dataType" : "string",
	    "regex" : null,
	    "validation" : "alfanum",
	    "sanitization" : "string",
	    "isUnique" : false
  }, 
  {
    "attribute" : "join_date",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  },
  {
    "attribute" : "rt_val",
    "dataType" : "integer",
    "regex" : null,
    "validation" : "number",
    "sanitization" : "int",
    "isUnique" : false
  }
];