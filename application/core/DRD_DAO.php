<?php

/*
 * Copyright 2017 Gaddiel
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

    /**
     * DAO base model
     *
     * @package database
     * @subpackage Model
     * @since 0.1
     */
    class DRD_DAO extends CI_Model 
    {
        /**
         * DBCommandClass object
         *
         * @acces public
         * @since 0.1
         * @var DBCommandClass
         */
        var $dao;
        /**
         * Table name
         *
         * @access private
         * @since unknown
         * @var string
         */
        var $tableName;
        /**
         * Table prefix
         *
         * @access private
         * @since unknown
         * @var string
         */
        var $tablePrefix;
        /**
         * Primary key of the table
         *
         * @access private
         * @since 0.1
         * @var string
         */
        var $primaryKey;
		/**
         * UniqueKey key of the table
         *
         * @access private
         * @since 0.1
         * @var string
         */
        var $uniqueKey;
        /**
         * Fields of the table
         *
         * @access private
         * @since 0.1
         * @var array
         */
        var $fields;

        /**
         * Init connection of the database and create DBCommandClass object
         */
        function __construct()
        {
            $this->load->database();
        }
		
		/**
         * Get the result match of the primary key passed by parameter
         *
         * @access public
         * @since unknown
         * @param string $value
         * @return mixed If the result has been found, it return the array row. If not, it returns false
         */
		
        function findByPrimaryKey($value)
        {
			$this->db->select($this->fields);
            $this->db->from($this->getTableName());
            $this->db->where($this->getPrimaryKey(), $value);
            $result = $this->db->get();
			
            if( $result === false ) {
                return false;
            }

            if( $result->num_rows() !== 1 ) {
                return false;
            }

            return $result->row_array();
		}
		
		function findByUniqueKey($value)
        {	
			$this->db->select($this->fields);
            $this->db->from($this->getTableName());
			//log_message('info' ,"Return Unique value = ".print_r($this->getUniqueKey()));
			$this->db->where($this->getUniqueKey(), $value);
            $result = $this->db->get();
			
            if( $result === false ) {
                return false;
            }

            if( $result->num_rows() !== 1 ) {
                return false;
            }
			return $result->row_array(); 
		}
    
       /**
         * Basic insert
         *
         * @access public
         * @since unknown
         * @param array $values
         * @return boolean
         */
		 
        /* function insert($values)
        {
          
            $this->db->from($this->getTableName());
            $this->db->set($values);
            return $this->db->insert();
        } */
		
		  function insert($values)
        {          
            return $this->db->insert($this->getTableName(),$values);
        }
		
		
		
        /**
         * Basic update. It returns false if the keys from $values or $where doesn't
         * match with the fields defined in the construct
         *
         * @access public
         * @since unknown
         * @param array $values Array with keys (database field) and values
         * @param array $where
         * @return mixed It returns the number of affected rows if the update has been
         * correct or false if an error happended
         */
        function update($values, $where)
        {
            if( !$this->checkFieldKeys(array_keys($values)) ) {
                return false;
            }

            if( !$this->checkFieldKeys(array_keys($where)) ) {
                return false;
            }

            $this->db->from($this->getTableName());
            $this->db->set($values);
            $this->db->where($where);
            return $this->db->update();
        }
		
		/**
         * Set table name, adding the DB_TABLE_PREFIX at the beginning
         *
         * @access private
         * @since unknown
         * @param string $table
         */
        function setTableName($table)
        {
            $this->tableName = $this->tablePrefix . $table;
        }

        /**
         * Get table name
         *
         * @access public
         * @since unknown
         * @return string
         */
        function getTableName()
        {
            return $this->tableName;
        }

        /**
         * Set primary key string
         *
         * @access private
         * @since unknown
         * @param string $key
         */
        function setPrimaryKey($key)
        {
			log_message('info',"Set primaryKey".$key);
            $this->primaryKey = $key;
        }
		
        /**
         * Set Unique key string
         *
         * @access private
         * @since unknown
         * @param string $key
         */
		
		function setUniqueKey($key)
        {
			log_message('info',"Set uniqueKey".$key);
            $this->uniqueKey = $key;
        }

        /**
         * Get primary key string
         *
         * @access public
         * @since unknown
         * @return string
         */
        function getPrimaryKey()
        {
			log_message('info',"get primaryKey".$this->primaryKey);
            return $this->primaryKey;
        }
		
        /**
         * Get unique key string
         *
         * @access public
         * @since unknown
         * @return string
         */
		function getUniqueKey()
        {
			log_message('info',"get uniqueKey".$this->uniqueKey);
            return $this->uniqueKey;
        }

        /**
         * Set fields array
         *
         * @access private
         * @since 0.1
         * @param array $fields
         */
        function setFields($fields)
        {
            $this->fields = $fields;
        }

        /**
         * Get fields array
         *
         * @access public
         * @since 0.1
         * @return array
         */
        function getFields()
        {
            return $this->fields;
        }

        /**
         * Check if the keys of the array exist in the $fields array
         *
         * @access private
         * @since 0.1
         * @param array $aKey
         * @return boolean
         */
        function checkFieldKeys($aKey)
        {
            foreach($aKey as $key) {
                if( !in_array($key, $this->getFields()) ) {
                    return false;
                }
            }
            return true;
        }

		/**
         * common function to serve multiple queries
         *
         * @access public
         * @since 0.1
         * @return array of getTableName()
         */
  
  
  /**
         * common function to serve multiple queries
         *
         * @access public
         * @since 0.1
         * @return array of getTableName()
         */
  
		function listWhere() {
			$argv = func_get_args();
			$sql = null;
			switch (func_num_args ()) {
				case 0: continue;
				case 1: $sql = $argv[0];
					break;
				case 2:
					$sql = $argv[0];
					$orderBy = $argv[1];
					break;
				default:
					$args = func_get_args();
					$format = array_shift($args);
					foreach($args as $k => $v) {
						$args[$k] = $this->db->escape($v);
					}
					$sql = vsprintf($format, $args);
					break;
			}
			$this->db->select('*');
			$this->db->from($this->getTableName());			
			if(func_num_args ()){
				$this->db->where($sql);
			}
			$this->db->order_by($orderBy);
			$result = $this->db->get();
			if ($result->num_rows() >= 1) {
				log_message('info',print_r($result->result_array(),TRUE));
				return $result->result_array();
			} else {
				return array();
			}

		}
		
		
		  /**
         * Get all the rows from the table $tableName
         *
         * @access public
         * @since unknown
         * @return array
         */
        function listAll($orderBy=null)
        {
            $this->db->select($this->getFields());
            $this->db->from($this->getTableName());
			if($orderBy)
			{
				$this->db->order_by($orderBy);
			}
            $result = $this->db->get();

            if($result == false) {
                return array();
            }

            return $result->result_array();
        }
  
  
  
  
/**
         * Get the result match of all unique values
         *
         * @access public
         * @since unknown
         * @param string $value
         * @return mixed If the result has been found, it return the array row. If not, it returns false
         */
   
  function findByUniqueValue($value)
        {
            $this->db->select($this->fields);
            $this->db->from($this->getTableName());
            $this->db->where($value);
            $result = $this->db->get();
   
            if( $result === false ) {

                return false;
            }

            if( $result->num_rows() !== 1 ) {
                return false;
            }

            return $result->row_array();
         }
		 			     
		/**
         * Delete the result match from the primary key passed by parameter
         *
         * @access public
         * @since unknown
         * @param string $value
         * @return mixed It return the number of affected rows if the delete has been
         * correct or false if nothing has been modified
         */
        function deleteByPrimaryKey($value)
        {
			$cond = array(
                $this->getPrimaryKey() => $value
            );
             return $this->db->delete($this->getTableName(),$value);
        }
 
    }
	
    /* file end: ./includes/database/DAO.php */
?>
