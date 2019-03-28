using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Project
{
    #region Feeds
    public class Feeds
    {
        #region Member Variables
        protected int _id;
        protected string _text;
        protected string _ImageURL;
        protected int _userid;
        #endregion
        #region Constructors
        public Feeds() { }
        public Feeds(string text, string ImageURL, int userid)
        {
            this._text=text;
            this._ImageURL=ImageURL;
            this._userid=userid;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Text
        {
            get {return _text;}
            set {_text=value;}
        }
        public virtual string ImageURL
        {
            get {return _ImageURL;}
            set {_ImageURL=value;}
        }
        public virtual int Userid
        {
            get {return _userid;}
            set {_userid=value;}
        }
        #endregion
    }
    #endregion
}