-- Database: ggchat

-- DROP DATABASE ggchat;

CREATE DATABASE ggchat
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'French_Canada.1252'
    LC_CTYPE = 'French_Canada.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
    
-- Table: public.contact

-- DROP TABLE public.contact;

CREATE TABLE public.contact
(
    id integer NOT NULL DEFAULT nextval('contact_id_seq'::regclass),
    fk_membre1 integer,
    fk_membre2 integer,
    CONSTRAINT contact_pkey PRIMARY KEY (id),
    CONSTRAINT fk_membre1 FOREIGN KEY (fk_membre1)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_membre2 FOREIGN KEY (fk_membre2)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.contact
    OWNER to postgres;
    
-- Table: public.groupe

-- DROP TABLE public.groupe;

CREATE TABLE public.groupe
(
    id integer NOT NULL DEFAULT nextval('groupe_id_seq'::regclass),
    groupe_nom character varying(50) COLLATE pg_catalog."default",
    CONSTRAINT groupe_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.groupe
    OWNER to postgres;
    
-- Table: public.membre

-- DROP TABLE public.membre;

CREATE TABLE public.membre
(
    id integer NOT NULL DEFAULT nextval('membre_id_seq'::regclass),
    membre_admin boolean,
    membre_first character varying(50) COLLATE pg_catalog."default",
    membre_last character varying(50) COLLATE pg_catalog."default",
    membre_email character varying(100) COLLATE pg_catalog."default",
    membre_uid character varying(50) COLLATE pg_catalog."default",
    membre_pwd character varying(262) COLLATE pg_catalog."default",
    CONSTRAINT membre_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.membre
    OWNER to postgres;
    
-- Table: public.message_groupe

-- DROP TABLE public.message_groupe;

CREATE TABLE public.message_groupe
(
    id integer NOT NULL DEFAULT nextval('message_groupe_id_seq'::regclass),
    groupe_fkey integer,
    membre_fkey integer,
    message_groupe_contenu character varying(255) COLLATE pg_catalog."default",
    "timestamp" character varying(255) COLLATE pg_catalog."default",
    CONSTRAINT groupe_fkey FOREIGN KEY (groupe_fkey)
        REFERENCES public.groupe (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT membre_fkey FOREIGN KEY (membre_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.message_groupe
    OWNER to postgres;
    
-- Table: public.message_groupe_archive

-- DROP TABLE public.message_groupe_archive;

CREATE TABLE public.message_groupe_archive
(
    id integer NOT NULL DEFAULT nextval('message_groupe_archive_id_seq'::regclass),
    groupe_fkey integer,
    membre_fkey integer,
    message_groupe_contenu character varying(255) COLLATE pg_catalog."default",
    "timestamp" character varying(255) COLLATE pg_catalog."default",
    CONSTRAINT groupe_fkey FOREIGN KEY (groupe_fkey)
        REFERENCES public.groupe (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT membre_fkey FOREIGN KEY (membre_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.message_groupe_archive
    OWNER to postgres;
    
-- Table: public.message_prive

-- DROP TABLE public.message_prive;

CREATE TABLE public.message_prive
(
    id integer NOT NULL DEFAULT nextval('message_prive_id_seq'::regclass),
    membre_envoyeur_fkey integer,
    membre_receveur_fkey integer,
    message_prive_contenu character varying(255) COLLATE pg_catalog."default",
    "timestamp" character varying(255) COLLATE pg_catalog."default",
    CONSTRAINT membre_envoyeur_fkey FOREIGN KEY (membre_envoyeur_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT membre_receveur_fkey FOREIGN KEY (membre_receveur_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.message_prive
    OWNER to postgres;
    
-- Table: public.message_prive_archive

-- DROP TABLE public.message_prive_archive;

CREATE TABLE public.message_prive_archive
(
    id integer NOT NULL DEFAULT nextval('message_prive_archive_id_seq'::regclass),
    membre_envoyeur_fkey integer,
    membre_receveur_fkey integer,
    message_prive_contenu character varying(255) COLLATE pg_catalog."default",
    "timestamp" character varying(255) COLLATE pg_catalog."default",
    CONSTRAINT membre_envoyeur_fkey FOREIGN KEY (membre_envoyeur_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT membre_receveur_fkey FOREIGN KEY (membre_receveur_fkey)
        REFERENCES public.membre (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.message_prive_archive
    OWNER to postgres;