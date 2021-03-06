PGDMP     7    -                x            ggchat    12.4    12.4 7    M           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            N           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            O           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            P           1262    90124    ggchat    DATABASE     �   CREATE DATABASE ggchat WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_Canada.1252' LC_CTYPE = 'French_Canada.1252';
    DROP DATABASE ggchat;
                postgres    false            �            1259    106619    groupe    TABLE     ^   CREATE TABLE public.groupe (
    id integer NOT NULL,
    groupe_nom character varying(50)
);
    DROP TABLE public.groupe;
       public         heap    postgres    false            �            1259    106617    groupe_id_seq    SEQUENCE     �   CREATE SEQUENCE public.groupe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.groupe_id_seq;
       public          postgres    false    214            Q           0    0    groupe_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.groupe_id_seq OWNED BY public.groupe.id;
          public          postgres    false    213            �            1259    106518    membre    TABLE       CREATE TABLE public.membre (
    id integer NOT NULL,
    membre_admin boolean,
    membre_first character varying(50),
    membre_last character varying(50),
    membre_email character varying(100),
    membre_uid character varying(50),
    membre_pwd character varying(262)
);
    DROP TABLE public.membre;
       public         heap    postgres    false            �            1259    106516    membre_id_seq    SEQUENCE     �   CREATE SEQUENCE public.membre_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.membre_id_seq;
       public          postgres    false    203            R           0    0    membre_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.membre_id_seq OWNED BY public.membre.id;
          public          postgres    false    202            �            1259    106529    message_groupe    TABLE     �   CREATE TABLE public.message_groupe (
    id integer NOT NULL,
    groupe_fkey integer,
    membre_fkey integer,
    message_groupe_contenu character varying(255),
    "timestamp" character varying(255)
);
 "   DROP TABLE public.message_groupe;
       public         heap    postgres    false            �            1259    106548    message_groupe_archive    TABLE     �   CREATE TABLE public.message_groupe_archive (
    id integer NOT NULL,
    groupe_fkey integer,
    membre_fkey integer,
    message_groupe_contenu character varying(255),
    "timestamp" character varying(255)
);
 *   DROP TABLE public.message_groupe_archive;
       public         heap    postgres    false            �            1259    106546    message_groupe_archive_id_seq    SEQUENCE     �   CREATE SEQUENCE public.message_groupe_archive_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.message_groupe_archive_id_seq;
       public          postgres    false    207            S           0    0    message_groupe_archive_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.message_groupe_archive_id_seq OWNED BY public.message_groupe_archive.id;
          public          postgres    false    206            �            1259    106527    message_groupe_id_seq    SEQUENCE     �   CREATE SEQUENCE public.message_groupe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.message_groupe_id_seq;
       public          postgres    false    205            T           0    0    message_groupe_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.message_groupe_id_seq OWNED BY public.message_groupe.id;
          public          postgres    false    204            �            1259    106567    message_prive    TABLE     �   CREATE TABLE public.message_prive (
    id integer NOT NULL,
    membre_envoyeur_fkey integer,
    membre_receveur_fkey integer,
    message_prive_contenu character varying(255),
    "timestamp" character varying(255)
);
 !   DROP TABLE public.message_prive;
       public         heap    postgres    false            �            1259    106586    message_prive_archive    TABLE     �   CREATE TABLE public.message_prive_archive (
    id integer NOT NULL,
    membre_envoyeur_fkey integer,
    membre_receveur_fkey integer,
    message_prive_contenu character varying(255),
    "timestamp" character varying(255)
);
 )   DROP TABLE public.message_prive_archive;
       public         heap    postgres    false            �            1259    106584    message_prive_archive_id_seq    SEQUENCE     �   CREATE SEQUENCE public.message_prive_archive_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.message_prive_archive_id_seq;
       public          postgres    false    211            U           0    0    message_prive_archive_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.message_prive_archive_id_seq OWNED BY public.message_prive_archive.id;
          public          postgres    false    210            �            1259    106565    message_prive_id_seq    SEQUENCE     �   CREATE SEQUENCE public.message_prive_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.message_prive_id_seq;
       public          postgres    false    209            V           0    0    message_prive_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.message_prive_id_seq OWNED BY public.message_prive.id;
          public          postgres    false    208            �            1259    106625    nombre_msg_group    VIEW     �   CREATE VIEW public.nombre_msg_group AS
 SELECT count(message_groupe.id) AS nombre,
    message_groupe.groupe_fkey
   FROM public.message_groupe
  GROUP BY message_groupe.groupe_fkey;
 #   DROP VIEW public.nombre_msg_group;
       public          postgres    false    205    205            �            1259    106609    select_all_membre    VIEW     �   CREATE VIEW public.select_all_membre AS
 SELECT membre.id,
    membre.membre_admin,
    membre.membre_first,
    membre.membre_last,
    membre.membre_email,
    membre.membre_uid,
    membre.membre_pwd
   FROM public.membre;
 $   DROP VIEW public.select_all_membre;
       public          postgres    false    203    203    203    203    203    203    203            �
           2604    106622 	   groupe id    DEFAULT     f   ALTER TABLE ONLY public.groupe ALTER COLUMN id SET DEFAULT nextval('public.groupe_id_seq'::regclass);
 8   ALTER TABLE public.groupe ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    213    214            �
           2604    106521 	   membre id    DEFAULT     f   ALTER TABLE ONLY public.membre ALTER COLUMN id SET DEFAULT nextval('public.membre_id_seq'::regclass);
 8   ALTER TABLE public.membre ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    203    203            �
           2604    106532    message_groupe id    DEFAULT     v   ALTER TABLE ONLY public.message_groupe ALTER COLUMN id SET DEFAULT nextval('public.message_groupe_id_seq'::regclass);
 @   ALTER TABLE public.message_groupe ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205            �
           2604    106551    message_groupe_archive id    DEFAULT     �   ALTER TABLE ONLY public.message_groupe_archive ALTER COLUMN id SET DEFAULT nextval('public.message_groupe_archive_id_seq'::regclass);
 H   ALTER TABLE public.message_groupe_archive ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    207    207            �
           2604    106570    message_prive id    DEFAULT     t   ALTER TABLE ONLY public.message_prive ALTER COLUMN id SET DEFAULT nextval('public.message_prive_id_seq'::regclass);
 ?   ALTER TABLE public.message_prive ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    209    209            �
           2604    106589    message_prive_archive id    DEFAULT     �   ALTER TABLE ONLY public.message_prive_archive ALTER COLUMN id SET DEFAULT nextval('public.message_prive_archive_id_seq'::regclass);
 G   ALTER TABLE public.message_prive_archive ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    211    211            J          0    106619    groupe 
   TABLE DATA           0   COPY public.groupe (id, groupe_nom) FROM stdin;
    public          postgres    false    214   �A       @          0    106518    membre 
   TABLE DATA           s   COPY public.membre (id, membre_admin, membre_first, membre_last, membre_email, membre_uid, membre_pwd) FROM stdin;
    public          postgres    false    203   4B       B          0    106529    message_groupe 
   TABLE DATA           k   COPY public.message_groupe (id, groupe_fkey, membre_fkey, message_groupe_contenu, "timestamp") FROM stdin;
    public          postgres    false    205   �B       D          0    106548    message_groupe_archive 
   TABLE DATA           s   COPY public.message_groupe_archive (id, groupe_fkey, membre_fkey, message_groupe_contenu, "timestamp") FROM stdin;
    public          postgres    false    207   3C       F          0    106567    message_prive 
   TABLE DATA           {   COPY public.message_prive (id, membre_envoyeur_fkey, membre_receveur_fkey, message_prive_contenu, "timestamp") FROM stdin;
    public          postgres    false    209   PC       H          0    106586    message_prive_archive 
   TABLE DATA           �   COPY public.message_prive_archive (id, membre_envoyeur_fkey, membre_receveur_fkey, message_prive_contenu, "timestamp") FROM stdin;
    public          postgres    false    211   �C       W           0    0    groupe_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.groupe_id_seq', 2, true);
          public          postgres    false    213            X           0    0    membre_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.membre_id_seq', 1, true);
          public          postgres    false    202            Y           0    0    message_groupe_archive_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.message_groupe_archive_id_seq', 1, false);
          public          postgres    false    206            Z           0    0    message_groupe_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.message_groupe_id_seq', 9, true);
          public          postgres    false    204            [           0    0    message_prive_archive_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.message_prive_archive_id_seq', 1, false);
          public          postgres    false    210            \           0    0    message_prive_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.message_prive_id_seq', 1, true);
          public          postgres    false    208            �
           2606    106624    groupe groupe_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.groupe
    ADD CONSTRAINT groupe_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.groupe DROP CONSTRAINT groupe_pkey;
       public            postgres    false    214            �
           2606    106526    membre membre_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.membre
    ADD CONSTRAINT membre_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.membre DROP CONSTRAINT membre_pkey;
       public            postgres    false    203            �
           1259    106604    index_message_groupe_fkey    INDEX     [   CREATE INDEX index_message_groupe_fkey ON public.message_groupe USING btree (groupe_fkey);
 -   DROP INDEX public.index_message_groupe_fkey;
       public            postgres    false    205            �
           1259    106606 "   index_message_membre_envoyeur_fkey    INDEX     l   CREATE INDEX index_message_membre_envoyeur_fkey ON public.message_prive USING btree (membre_envoyeur_fkey);
 6   DROP INDEX public.index_message_membre_envoyeur_fkey;
       public            postgres    false    209            �
           1259    106605    index_message_membre_fkey    INDEX     [   CREATE INDEX index_message_membre_fkey ON public.message_groupe USING btree (membre_fkey);
 -   DROP INDEX public.index_message_membre_fkey;
       public            postgres    false    205            �
           1259    106607 "   index_message_membre_receveur_fkey    INDEX     l   CREATE INDEX index_message_membre_receveur_fkey ON public.message_prive USING btree (membre_receveur_fkey);
 6   DROP INDEX public.index_message_membre_receveur_fkey;
       public            postgres    false    209            �
           1259    106608    index_message_prive_contenu    INDEX     f   CREATE INDEX index_message_prive_contenu ON public.message_prive USING btree (message_prive_contenu);
 /   DROP INDEX public.index_message_prive_contenu;
       public            postgres    false    209            �
           2606    106574 "   message_prive membre_envoyeur_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message_prive
    ADD CONSTRAINT membre_envoyeur_fkey FOREIGN KEY (membre_envoyeur_fkey) REFERENCES public.membre(id);
 L   ALTER TABLE ONLY public.message_prive DROP CONSTRAINT membre_envoyeur_fkey;
       public          postgres    false    209    203    2737            �
           2606    106593 *   message_prive_archive membre_envoyeur_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message_prive_archive
    ADD CONSTRAINT membre_envoyeur_fkey FOREIGN KEY (membre_envoyeur_fkey) REFERENCES public.membre(id);
 T   ALTER TABLE ONLY public.message_prive_archive DROP CONSTRAINT membre_envoyeur_fkey;
       public          postgres    false    2737    211    203            �
           2606    106541    message_groupe membre_fkey    FK CONSTRAINT     ~   ALTER TABLE ONLY public.message_groupe
    ADD CONSTRAINT membre_fkey FOREIGN KEY (membre_fkey) REFERENCES public.membre(id);
 D   ALTER TABLE ONLY public.message_groupe DROP CONSTRAINT membre_fkey;
       public          postgres    false    2737    203    205            �
           2606    106560 "   message_groupe_archive membre_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message_groupe_archive
    ADD CONSTRAINT membre_fkey FOREIGN KEY (membre_fkey) REFERENCES public.membre(id);
 L   ALTER TABLE ONLY public.message_groupe_archive DROP CONSTRAINT membre_fkey;
       public          postgres    false    203    2737    207            �
           2606    106579 "   message_prive membre_receveur_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message_prive
    ADD CONSTRAINT membre_receveur_fkey FOREIGN KEY (membre_receveur_fkey) REFERENCES public.membre(id);
 L   ALTER TABLE ONLY public.message_prive DROP CONSTRAINT membre_receveur_fkey;
       public          postgres    false    2737    209    203            �
           2606    106598 *   message_prive_archive membre_receveur_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.message_prive_archive
    ADD CONSTRAINT membre_receveur_fkey FOREIGN KEY (membre_receveur_fkey) REFERENCES public.membre(id);
 T   ALTER TABLE ONLY public.message_prive_archive DROP CONSTRAINT membre_receveur_fkey;
       public          postgres    false    203    2737    211            J   ,   x�3�t/�/-HUH��.#������+��,
��qqq S�      @   s   x�3�,�tOL*�L���y�Wr�C��@^�CF~Inbf�^ZgIjq	��Q������Q����o`I�A�a��a�yaUHjrR^�~Xe�`�wi���apy^�eE�q�w�[�;W� ��%.      B   l   x�]�1
�0��+�����hL:[�`#$�p���7����0���NdUl�hb̈́D��`=��	�LKĘPF��:��M��TA�8�W��|������f��D.�� nk�      D      x������ � �      F   *   x�3�4Bǜ�|N##]C#]#CC+cc+#�=... �8�      H      x������ � �     