<?PHP
/*
 *   Abstract class for basic ORM functionality. Classes representing rows in a relational database
 *   should extend AbstractModel.
 *
 *   Currently uses MSQLi connector.
 */

Class AbstractModel {

    // Database server, name, and login credentials.
    private static $_dbServer;
    private static $_dbName;
    private static $_dbUser;
    private static $_dbPwd;

    /*
     *  Static function that initializes the static properties used to access
     *  the database.
     *
     *  In a production deployment, these fields would be more safely initialized by
     *  reading them out of a properties file stored outside the document root or in
     *  a secondary database table accessible by a user with restricted readonly permissions.
     */
    static function _init() {
        self::$_dbServer = "localhost";
        self::$_dbName = "applicant_project"
        self::$_dbUser = "scott";
        self::$_dbPwd = "tiger";
    }

    private $_dbConn = NULL;        // Connection to the MySQL database
    private $_dbServer;

	protected $_table;
	protected $_pk;
    protected $_fieldArray;        // Array with keys = field names and values = values for that object (row)
    private   $_createQuery;        // Prepared stmt for creating a new contact in the database
    private   $_updateQuery;        // Prepared stmt for updating fields in an existing contact

    /*
     *   Create a new object
     *
     * tName is the name of the table. This currently assumes that the table already exists.
     * fArray is an array whose keys are the field names in the database, array values should be NULL at this point.
     * By convention, the first field in the array is the primary key.
     */
    public function __construct($tName, $fArray);
        this->$_table = $tName;
        this->$_fieldArray = $fArray;
        $fieldNames = array_keys($_fieldArray);
        this->$_pk = $fieldNames[0];

        // Open our connection to the database.
        this->$_dbConn = new mysqli(this::$_dbServer, this::$_dbUser, this::$_dbPwd, this::$_dbName);
        if(mysqli_connect_errno()) {
           // echo "Connection Failed: " . mysqli_connect_errno(); TODO: add correct error handling
        }

        // Create the prepared statements
        // First, the query used to add a new contact to the database
        $valuesStr = "VALUES (";
        $createStr = "INSERT INTO " . $_table . " (";

        // For loop because we want to skip the primary key at index 0

        for ($i = 1; $i < (count($_fieldNames) - 1); i++) {
            $createStr .= ($fieldNames[i] . ", ");
            $valuesStr .= "?,"
        }
        $createStr .= ($fieldNames[i] . ") " . $valuesStr . "?);";

        this->$_createQuery = mysqli_prepare(this->$_dbConn, $createStr);
        if (!this->createQuery) {
            // TODO: add correct error handling
        }
        $_saveQuery =
    }

    public function __destruct() {
        if ($_dbConn) {
            mysqli_close($_dbConn);  // TODO: Should we check for an error? Would be good to log at least.
        }
    }

    /*
     *  Method to save state to the database
     */
    public function save() {

    }


        public function load($id)
        public function delete($id)
        public function getData($key=false)
        public function setData($arr, $value=false)

}

AbstractModel::_init();
