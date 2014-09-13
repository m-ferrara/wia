var EntityValidationRules = [{
    ENTITY : "citation",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["author", "source", "pub_yr", "title"],
        OPTIONAL : ["source_secondary", "pub_date", "isbn_id", "cit_desc", "internet_address", "pages"],
        UNIQUE : ["title"]
      },
      POST :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : ["author", "source", "pub_yr", "title", "source_secondary", "pub_date", "isbn_id", "cit_desc", "internet_address", "pages"],
        UNIQUE : ["title"]
      },
      DELETE :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "comment",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["cit_id", "author", "cmt_body", "cmt_date", "u_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : ["cmt_id", "u_id"],
        OPTIONAL : ["cit_id", "author", "cmt_body", "cmt_date"],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["cmt_id", "u_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "earn",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["u_id", "pts_total"],
        OPTIONAL : [],
        UNIQUE : ["u_id"]
      },
      POST :
      {
        REQUIRED : ["u_id", "pts_total"],
        OPTIONAL : [],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "favorite",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["list_name", "u_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : ["list_id", "u_id"],
        OPTIONAL : ["list_name"],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["list_id", "u_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "meta",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : ["amnt_votes", "avg_rating", "added_by", "cit_views_ct", "cit_cmts_ct"],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : ["amnt_votes", "avg_rating", "added_by", "cit_views_ct", "cit_cmts_ct"],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "share",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["sender_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["sender_id", "recipient_id", "cit_id", "timestamp"],
        OPTIONAL : ["message"],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : [],
        OPTIONAL : [],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["sender_id", "recipient_id", "timestamp"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "tag",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["tag_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["tag", "cat_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : ["tag_id", "tag"],
        OPTIONAL : [],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["tag_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
	    ENTITY : "category",
	    METHOD :
	    {
	      GET :
	      {
	        REQUIRED : ["cat_id"],
	        OPTIONAL : [],
	        UNIQUE : []
	      },
	      PUT :
	      {
	        REQUIRED : ["cat", "cat_id"],
	        OPTIONAL : [],
	        UNIQUE : []
	      },
	      POST :
	      {
	        REQUIRED : ["cat", "cat_id"],
	        OPTIONAL : [],
	        UNIQUE : []
	      },
	      DELETE :
	      {
	        REQUIRED : ["cat_id"],
	        OPTIONAL : [],
	        UNIQUE : []
	      }
	    }
	  },
  {
    ENTITY : "user",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["email", "password"],
        OPTIONAL : ["name_first", "name_last"],
        UNIQUE : ["email"]
      },
      POST :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : ["email", "password", "name_first", "name_last"],
        UNIQUE : ["email"]
      },
      DELETE :
      {
        REQUIRED : ["u_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  },
  {
    ENTITY : "vote",
    METHOD :
    {
      GET :
      {
        REQUIRED : ["u_id", "cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      },
      PUT :
      {
        REQUIRED : ["u_id", "cit_id", "rt_val"],
        OPTIONAL : [],
        UNIQUE : []
      },
      POST :
      {
        REQUIRED : ["u_id", "cit_id", "rt_val"],
        OPTIONAL : [],
        UNIQUE : []
      },
      DELETE :
      {
        REQUIRED : ["u_id", "cit_id"],
        OPTIONAL : [],
        UNIQUE : []
      }
    }
  }
];
